<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static LEMON350()
 * @method static static LEMON500()
 * @method static static LEMON350_6()
 * @method static static LEMON500_6()
 * @method static static OTOKOMAE350()
 * @method static static OTOKOMAE500()
 * @method static static OTOKOMAE350_6()
 * @method static static OTOKOMAE500_6()
 * @method static static OITASHI350()
 * @method static static OITASHI500()
 * @method static static OITASHI350_6()
 * @method static static OITASHI500_6()
 * @method static static SHIO_LEMON350()
 * @method static static SHIO_LEMON500()
 */

final class StampTypeEnum extends Enum
{
    const LEMON350 = 0;
    const LEMON500 = 1;
    const LEMON350_6 = 2;
    const LEMON500_6 = 3;
    const OTOKOMAE350 = 4;
    const OTOKOMAE500 = 5;
    const OTOKOMAE350_6 = 6;
    const OTOKOMAE500_6 = 7;
    const OITASHI350 = 8;
    const OITASHI500 = 9;
    const OITASHI350_6 = 10;
    const OITASHI500_6 = 11;
    const SHIO_LEMON350 = 12;
    const SHIO_LEMON500 = 13;

    /**
     * Get the number translated value.
     *
     * @param string $value
     * @return string
     */
    public static function getDisplayNumberValue($value)
    {
        switch($value) {
            case self::LEMON350:
                return '4901777332508';
            case self::LEMON500:
                return '4901777332522';
            case self::LEMON350_6:
                return '4901777337015';
            case self::LEMON500_6:
                return '4901777345430';

            case self::OTOKOMAE350:
                return '4901777340510';
            case self::OTOKOMAE500:
                return '4901777340534';
            case self::OTOKOMAE350_6:
                return '4901777349988';
            case self::OTOKOMAE500_6:
                return '4901777363526';

            case self::OITASHI350:
                return '4901777361607';
            case self::OITASHI500:
                return '4901777361621';
            case self::OITASHI350_6:
                return '4901777361645';
            case self::OITASHI500_6:
                return '4901777364479';

            case self::SHIO_LEMON350:
                return '4901777365544';
            case self::SHIO_LEMON500:
                return '4901777365568';

            default:
                return 'その他';
        }
    }

    /**
     *  Get the value translated number.
     *
     * @param string $value
     * @return string
     */
    public static function getBarcodeValue(string $key)
    {
        switch($key) {
            case '4901777332508':
                return self::LEMON350;
            case '4901777332522':
                return self::LEMON500;
            case '4901777337015':
                return self::LEMON350_6;
            case '4901777345430':
                return self::LEMON500_6;

            case '4901777340510':
                return self::OTOKOMAE350;
            case '4901777340534':
                return self::OTOKOMAE500;
            case '4901777349988':
                return self::OTOKOMAE350_6;
            case '4901777363526':
                return self::OTOKOMAE500_6;

            case '4901777361607':
                return self::OITASHI350;
            case '4901777361621':
                return self::OITASHI500;
            case '4901777361645':
                return self::OITASHI350_6;
            case '4901777364479':
                return self::OITASHI500_6;

            case '4901777365544':
                return self::SHIO_LEMON350;
            case '4901777365568':
                return self::SHIO_LEMON500;

            default:
                return 'その他';
        }
    }

    /**
     * Return available codes.
     *
     * @return array
     */
    public static function getAllStampCode()
    {
        return [
            4901777332508,4901777332522,4901777337015,4901777345430,
            4901777340510,4901777340534,4901777349988,4901777363526,
            4901777361607,4901777361621,4901777361645,4901777364479,
            4901777365544,4901777365568,
        ];
    }
}
