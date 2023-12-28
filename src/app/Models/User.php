<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable
{
    use Notifiable, Traits\ScopeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password', 'mypage_id', 'tonariwa_id', 'winning_rate', 'teiban_flag', 'otokomae_flag', 'oitashi_flag', 'shio_flag',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];

    /**
     * Get the Stamps of User
     */
    public function stamps()
    {
        return $this->hasMany(Stamp::class);
    }

    /**
     * Get the Stamps of User
     */
    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    /**
     * Get the BTC Serial of User
     */
    public function btcSerial()
    {
        return $this->hasOne(BtcSerial::class);
    }

    /**
     * Find user by tonariwa id.
     *
     * @param  $query
     * @param  $tonariwaId
     * @return void
     */
    public function scopeTonariwaId($query, $tonariwaId)
    {
        return $query->where('tonariwa_id', $tonariwaId);
    }
}
