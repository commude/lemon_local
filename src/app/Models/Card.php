<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use Traits\ScopeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'card_number', 'lottery_status', 'lottery_date',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'lottery_date',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the user that belongs to this card.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the Winning Rates of User
     */
    public function stamps()
    {
        return $this->hasMany(Stamp::class);
    }

}
