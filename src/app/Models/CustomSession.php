<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomSession extends Model
{
    /**
    * Indicates if the IDs are auto-incrementing.
    *
    * @var bool
    */
    public $incrementing = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sessions';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Scope a query to filter non expired Sessions.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param Carbon\Carbon                         $nowTimestamp
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNotExpired($query, $nowTimestamp)
    {
        $query->whereRaw('last_activity + (20 * 60)  > ?', [$nowTimestamp->timestamp]);
    }
}
