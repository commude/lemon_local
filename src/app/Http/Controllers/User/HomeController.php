<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CheckBarcodeRequest;
use App\Services\UserAgent;

class HomeController extends Controller
{
    /**
     * show the index page.
     */
    public function index(Request $request)
    {
        $userAgent = UserAgent::isMobileOrPc($request);
        return view('user.index')->with(compact('userAgent'));
    }

    /**
     * show the top page.
     */
    public function top(Request $request)
    {
        $userAgent = UserAgent::isMobileOrPc($request);
        return view('user.top')->with(compact('userAgent'));
    }

    /**
     * Show the user mypage.
     *
     */
    public function mypage()
    {
        return view('user.mypage');
    }

    /**
     * Show the user mypage.
     *
     */
    public function getStamp(CheckBarcodeRequest $request)
    {
        return view('user.getStamp');
    }

    /**
     * show the close page.
     */
    public function close(Request $request)
    {
        return view('user.close');
    }
}

