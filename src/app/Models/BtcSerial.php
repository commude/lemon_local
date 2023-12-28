<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BtcSerial extends Model
{
    use Traits\ScopeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'btc_serial'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at','updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
