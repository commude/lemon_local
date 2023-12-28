<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyData extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'daily_datas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'new_register_count',
        'first_lottery_count',
        'all_lottery_count',
        'jan_code_0',
        'jan_code_1',
        'jan_code_2',
        'jan_code_3',
        'jan_code_4',
        'jan_code_5',
        'jan_code_6',
        'jan_code_7',
        'jan_code_8',
        'jan_code_9',
        'jan_code_10',
        'jan_code_11',
        'jan_code_12',
        'jan_code_13',
        'win_count',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'date',
        'created_at',
        'updated_at',
    ];
}
