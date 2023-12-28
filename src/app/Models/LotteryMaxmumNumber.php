<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class LotteryMaxmumNumber extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'lottery_maxmum_numbers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pida', 'max_tries_at', 'max_tries', 'flag',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'max_tries_at', 'created_at', 'updated_at'
    ];
}
