<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static SUPER_LEVEL()
 * @method static static TOP_LEVEL()
 * @method static static MID_LEVEL()
 * @method static static LOW_LEVEL()
 */
final class AdminType extends Enum
{
    const SUPER_LEVEL = 'super_level';
    const TOP_LEVEL = 'top_level';
    const MID_LEVEL = 'mid_level';
    const LOW_LEVEL = 'low_level';
}
