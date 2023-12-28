<?php

namespace App\Services;

use Illuminate\Http\Request;

class UserAgent
{

    /**
     * Request オブジェクトでPCかスマホ判定をする。
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    public static function isMobileOrPc(Request $request)
    {
        $userAgent =  $request->header('User-Agent');
        if ((strpos($userAgent, 'iPhone') !== false)
            || (strpos($userAgent, 'Android') !== false)) {
            return 'mobile';
        }

        return 'pc';
    }

    /**
     * 文字列でPCかスマホ判定をする。
     *
     * @param string $userAgent
     * @return string
     */
    public static function isMobileOrPcFromString($userAgent)
    {
        if ((strpos($userAgent, 'iPhone') !== false)
            || (strpos($userAgent, 'Android') !== false)) {
            return 'mobile';
        }

        return 'pc';
    }

}
