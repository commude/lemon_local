<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckLotteryRateRequest;
use Illuminate\Http\Request;
use App\Models\LotteryRate;

class LotteryRateController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        $lotteryRateData = LotteryRate::orderBy('id', 'desc')->first();

        $lotteryRate = isset($lotteryRateData) ? $lotteryRateData->lottery_rate : 0;

        return view('admin.rateChange')->with(compact('lotteryRate'));
    }

    /**
     * Create lotteryRate record.
     *
     */
    public function store(CheckLotteryRateRequest $request)
    {
        $lotteryRateData = LotteryRate::create(['lottery_rate' => $request->lottery_rate]);

        $lotteryRate = $lotteryRateData->lottery_rate;
        session()->flash('flash_message', '当選確率を変更しました。');

        return view('admin.rateChange')->with(compact('lotteryRate'));
    }
}
