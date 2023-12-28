<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LotteryResultController extends Controller
{
    /**
     * get method mypage trasition
     *
     */
    public function index()
    {
        return redirect()->route('mypage');
    }

    public function lotteryResult(Request $request)
    {
        $referrer = $request->session()->get('_previous.url');
        $result = $request->result;
        return view('user.lotteryResult')->with(compact('result'));
    }
}
