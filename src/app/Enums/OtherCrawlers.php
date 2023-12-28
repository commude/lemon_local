<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static CRAWLERS()
 */
final class OtherCrawlers extends Enum
{
    // Add new crawlers that couldn't be detected by CrawlerDetect class
    const CRAWLERS = [
        'Ipswitch_WhatsUp/3.5'
    ];
}
