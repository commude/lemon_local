<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Webpatser\Uuid\Uuid;

class LineController extends Controller
{
    protected const LOGIN_CONFIRM = 'line-login-confirm';

    /**
     * get method top trasition
     *
     */
    public function index()
    {
        return redirect()->route('top');
    }

    /**
     * Redirect to Tonariwa Line login
     */
    public function login()
    {
        $uuidToken = Uuid::generate()->string;

        Cookie::queue(Cookie::make(self::LOGIN_CONFIRM, $uuidToken));
        Session::forget(self::LOGIN_CONFIRM);
        Session::put(self::LOGIN_CONFIRM, $uuidToken);

        return redirect()->away(config('app.tonariwa.url'));
    }

    /**
     * Handles Line login callback.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function loginCallback(Request $request)
    {
        // Topへリダイレクトさせる。
        if (!(Session::get(self::LOGIN_CONFIRM) == Cookie::get(self::LOGIN_CONFIRM) && $request->has('ln_cp') && $request->has('tonariwa_id'))) {
            return redirect()->route('top');
        }

        Session::forget(self::LOGIN_CONFIRM);
        Cookie::queue(Cookie::forget(self::LOGIN_CONFIRM));

        // キャンペーンパラメータの比較。
        if ($request->query('ln_cp') == config('app.tonariwa.campaign_id')) {
            $tonariwaId = $request->query('tonariwa_id');
            $user = User::tonariwaId($tonariwaId)->first();

            if (!$user) {
                $user = User::create([
                    'tonariwa_id' => $tonariwaId
                ]);
                // 効果的ではないが、安全になる。
                $user->mypage_id = sprintf('%08d', $user->id);
                $user->save();
            }

            $this->guard()->login($user);

            // マイページへリダイレクト。
            return redirect()->route('mypage');
        }

        // LINEログイン失敗時にTop画面へリダイレクト。
        return redirect()->route('top');
    }

    /**
     * login error
     */
    public function error()
    {
        Session::forget(self::LOGIN_CONFIRM);
        Cookie::queue(Cookie::forget(self::LOGIN_CONFIRM));

        return view('user.line_error');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('top');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    public function testLogin(User $user, Request $request)
    {
        //requestのidからtonariwaでユーザー検索
        $tonariwaId = $request->id;
    
        if (!$user) {
            $user = User::where('tonariwa_id', $tonariwaId)->first();
            //アカウント作成
            $user = User::create([
                'tonariwa_id' => $tonariwaId,
            ]);
            // 効果的ではないが、安全になる。
            $user->mypage_id = sprintf('%08d', $user->id);
            $user->save();
        }

        //$user->save();

        $this->guard()->login($user);

        //Log::info('testlogin[id:' . $user->id . ']');
        return redirect()->route('mypage');
    }


}
