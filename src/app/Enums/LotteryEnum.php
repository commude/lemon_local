<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static LOST()
 * @method static static WIN()
 * @method static static NO_LOTTERY()
 * @method static static DELIVER()
 */
final class LotteryEnum extends Enum
{
    const NO_LOTTERY = 1;
    const LOST = 2;
    const WIN = 3;

    /**
     * Get the japanese translated value.
     *
     * @param string $value
     * @return string
     */
    public static function getDisplayJPValue($value)
    {
        switch($value) {
            case self::NO_LOTTERY:
                return '未抽選';
            case self::LOST:
                return '落選';
            case self::WIN:
                return '当選';

            default:
                return 'その他';
        }
    }
}
