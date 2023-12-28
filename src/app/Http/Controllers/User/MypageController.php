<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Stamp;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class MypageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $today = Carbon::now();

        $stamps = Stamp::where('user_id', Auth::id())->get()->toArray();
        $flags = [];
        foreach($stamps as $stamp) {
            if ($stamp['stamp_type'] <= 3) {
                $flags = array_merge($flags, ['teiban_flag' => 1]);
            } elseif ($stamp['stamp_type'] >= 4 && $stamp['stamp_type'] <= 7) {
                $flags = array_merge($flags, ['otokomae_flag' => 1]);
            } elseif ($stamp['stamp_type'] >= 8 && $stamp['stamp_type'] <= 11) {
                $flags = array_merge($flags, ['oitashi_flag' => 1]);
            } elseif ($stamp['stamp_type'] >= 12) {
                $flags = array_merge($flags, ['shio_flag' => 1]);
            }
        }
        $user->fill($flags)->save();

        $flagArray = [];
        $flagArray = array_merge($flagArray,
            ['teiban' => $user->teiban_flag],
            ['otokomae' => $user->otokomae_flag],
            ['oitashi' => $user->oitashi_flag],
            ['shio' => $user->shio_flag],
        );

        $flagSum = array_sum($flagArray);
        if ($flagSum <= 1) {
            $winningRate = 1;
        } elseif ($flagSum >= 2 && $flagSum < 3) {
            $winningRate = 2;
        } elseif ($flagSum >= 3) {
            $winningRate = 3;
        }
        $user->fill(['winning_rate' => $winningRate])->save();

        $stampAll = array_chunk($stamps, 3);

        $latestCardInfo = Card::where('user_id', $user->id)->orderby('id',  'desc')->first();
        $cardId = isset($latestCardInfo) ? $latestCardInfo->id : 0;

        $stampCount = Stamp::where('user_id', $user->id)->where('card_id', $cardId)->count();

        $checkStatus = Card::where('id', $cardId)->first();
        $latestCardStatus = isset($checkStatus) ? $checkStatus->lottery_status : 0;

        $countCreateStampNumber = Stamp::where('user_id', $user->id)->whereDate('created_at', $today)->get()->count();

        //スタンプ無限発行フラグ
        if(config('app.allow_stampcreate_anytime')) {
            $countCreateStampNumber = 0;
        }

        $count = 1;
        $stampCountAll = session::get('stampCount');
        $i = 0;
        if (isset($stampCountAll)) {
            $i++;
            if ($i >= 1) {
                Session::forget('stampCount');
                $i = 0;
            }
        }

        $winCheck = Card::where('user_id', $user->id)->where('lottery_status', 3)->exists();

        return view('user.mypage')->with(compact('user', 'flagSum', 'stampAll', 'stampCount', 'latestCardStatus', 'countCreateStampNumber', 'count', 'stampCountAll', 'winCheck'));
    }
}
