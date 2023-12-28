<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\BtcSerial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BtcController extends Controller
{
    /**
     * get method mypage trasition
     *
     */
    public function index()
    {
        return redirect()->route('mypage');
    }

    /**
     * get btc_serial with user_id
     *
     * @return
     */
    public function create()
    {
        $user = Auth::user();
        $btcSerial = BtcSerial::where('user_id', $user->id)->first();

        if (!Card::where('user_id', $user->id)->where('lottery_status', 3)->exists()) {
            return redirect()->route('mypage');
        }

        if (!isset($btcSerial)) {
            $btcSerial = BtcSerial::whereNull('user_id')->orderby('id', 'asc')->first();
            DB::transaction(function() use ($btcSerial, $user) {
                $btcSerial->fill(['user_id' => $user->id])->save();
            });
        }

        return redirect()->away(config('app.btc.url') . $btcSerial->btc_serial . '&tonariwa_id=' . $user->tonariwa_id);
    }
}
