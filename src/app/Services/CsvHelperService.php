<?php

namespace App\Services;

class CsvHelperService
{
    /**
     * Convert data to csv Shift_JIS
     */
    public function arr2csvSjis($fields)
    {
        $fp = fopen('php://temp', 'r+b');
        foreach($fields as $field) {
            fputcsv($fp, $field);
        }
        rewind($fp);
        $tmp = str_replace(PHP_EOL, "\r\n", stream_get_contents($fp));
        return mb_convert_encoding($tmp, 'SJIS-win', 'UTF-8');
    }

    /**
     * Convert data to csv
     */
    public function arr2csv($fields)
    {
        $fp = fopen('php://temp', 'r+b');
        foreach($fields as $field) {
            fputcsv($fp, $field);
        }
        rewind($fp);
        $tmp = str_replace(PHP_EOL, "\r\n", stream_get_contents($fp));
        return $tmp;
    }

    /**
     * Add "" between values to avoid integer conversion.
     */
    public function stringConversion($value)
    {
        return '"'.$value.'"';
    }
}
