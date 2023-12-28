<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Admin\WinLimitController;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Card;
use App\Models\Stamp;
use App\Models\LotteryRate;
use App\Models\LotteryMaxmumNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class LotteryController extends Controller
{
    /**
     * get method mypage trasition
     *
     */
    public function index()
    {
        return redirect()->route('mypage');
    }

    public function lottery()
    {
        $userId = Auth::id();

        //スタンプ数
        $latestCardInfo = Card::where('user_id', $userId)->orderby('id',  'desc')->withCount('stamps')->first();
        $stampCount = isset($latestCardInfo) ? $latestCardInfo->stamps_count : 0;

        //カード状態
        $latestCardInfo = Card::where('user_id', $userId)->orderby('id',  'desc')->first();
        $lotteryStatus = isset($latestCardInfo) ? $latestCardInfo->lottery_status : 0;

        //スタンプ３つ未満、抽選待ち以外はアクセス禁止
        if ($stampCount !== 3 || $lotteryStatus !== 1) {
            return redirect()->route('mypage');
        }

        //当選率取得
        $lotteryData = LotteryRate::orderby('id', 'desc')->first();
        $lotteryRate = isset($lotteryData) ? $lotteryData->lottery_rate : 0;

        //個人当選率
        $lotteryRate = $lotteryRate * 10;
        $lotteryRate = $lotteryRate * User::find($userId)->winning_rate;

        //当選上限数未取得時
        $now = Carbon::now();
        $winLimit = LotteryMaxmumNumber::where('max_tries_at', '>', $now)->orderby('id', 'asc')->first();
        $max_tries = isset($winLimit) ? $winLimit->max_tries : 0;

        //当選上限数と現在の当選数の比較
        $lotteryWinCount = Card::where('lottery_status', 3)->count();
        if ($lotteryWinCount >= $max_tries) {
            $lotteryRate = 0;
        }

        //過去当選者の抽選確率
        if (Card::where('user_id', $userId)->where('lottery_status', 3)->exists()) {
            $lotteryRate = 0;
        }

        //キャンペーン期間外の抽選確率0
        $deadline = Carbon::createFromFormat('Y-m-d H:i:s', config('app.deadline'));
        if ($now->gt($deadline)) {
            $lotteryRate = 0;
        }

        //抽選
        $weight_list = [
            3 => "$lotteryRate",          //win
            2 => 1000 - "$lotteryRate",     //lost
        ];
        $result_number = random_int(1, array_sum($weight_list));// 1~1000
        $total_weight = 0;
        foreach ($weight_list as $name => $weight)
        {
            $total_weight += $weight;
            if ($result_number <= $total_weight)
            {
                $result = $name;
                break;
            }
        }

        //抽選結果記録
        $now = Carbon::now();
        $latestCardInfo = Card::where('user_id', $userId)->orderby('id',  'desc')->first();
        if (isset($latestCardInfo)) {
            $latestCardInfo->lottery_status = $result;
            $latestCardInfo->lottery_date = $now;
            $latestCardInfo->save();
        }

        return view('user.lottery')->with(compact('result'));
    }
}
