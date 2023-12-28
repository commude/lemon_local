<?php

namespace App\Http\Middleware;

use App\Enums\OtherCrawlers;
use Closure;

class NoSessionForBotsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ((new \Jaybizzle\CrawlerDetect\CrawlerDetect)->isCrawler() || $this->isOtherCrawlers($request->header('User-Agent'))) {
            \Config::set('session.driver', 'array');
        }

        return $next($request);
    }

    /**
     * Detect if crawler is from another source (Ipswitch_WhatsUp, etc etc)
     *
     * @param string $userAgent
     * @return boolean
     */
    protected function isOtherCrawlers($userAgent)
    {
        foreach (OtherCrawlers::CRAWLERS as $otherCrawler) {
            if ($userAgent == $otherCrawler) { // Return true if the array finds the other crawlers.
                return true;
            }
        }

        return false;
    }
}
