<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\CustomSession;
use App\Providers\RouteServiceProvider;
use App\Services\RecaptchaService;
use Carbon\Carbon;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * Guardの認証方法を指定
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }

    /**
     * login function
     * ログイン画面
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Services\RecaptchaService $service
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request, RecaptchaService $service)
    {
        $this->validateLogin($request);

        try {
            if (!$service->validate($request->input('g-recaptcha-response'))) {
                throw ValidationException::withMessages([
                    'g-recaptcha-response' => trans('auth.recaptcha_failed'),
                ]);
            }
        } catch (Exception $e) {
            Log::error('Recaptcha Error. ', ['message' => $e->getMessage()]);
            throw ValidationException::withMessages([
                'g-recaptcha-response' => trans('auth.recaptcha_failed'),
            ]);
        }

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        $this->guard()->logoutOtherDevices($request->password);

        return $request->wantsJson()
                    ? new Response('', 204)
                    : redirect()->intended($this->redirectPath());
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => ['required', 'string'],
            'password' => ['required', 'string'],
            'g-recaptcha-response' => ['required', 'string'],
        ]);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        return route('admin.index');
    }

    /**
     * logout after redirect path
     * ログアウトした時のリダイレクト先
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function loggedOut(Request $request)
    {
        return redirect()->route('admin.login');
    }

    /**
     * Check if there are any other login sessions of admin.
     */
    protected function hasLoginSessions($user)
    {
        $now = Carbon::now();

        $userSessionsCounts = CustomSession::notExpired($now)
                            ->where('user_id', $user->id)
                            ->count();

        return $userSessionsCounts >= 1;
    }
}
