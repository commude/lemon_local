<?php

namespace App\Models\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

trait ScopeTrait
{
    /**
     * Scope a query to search for value.
     * If this query is slow, remove first '%' from the where clause.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string                                $columnName
     * @param string                                $value
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearchFor($query, $columnName, $value)
    {
        return $query->where($columnName, 'LIKE', '%'.$value.'%');
    }

    /**
     * Scope a query to search for value.
     * If this query is slow, remove first '%' from the where clause.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string                                $columnName
     * @param string                                $value
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrSearchFor($query, $columnName, $value)
    {
        return $query->orWhere($columnName, 'LIKE', '%'.$value.'%');
    }

    /**
     * Scope a query to search within the foreign table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string                                $tableName
     * @param string                                $columnName
     * @param string                                $value
     *
     * @return mixed
     */
    public function scopeWhereHasSearchFor($query, $tableName, $columnName, $value)
    {
        if ($value || $value === 0 || $value === true) {
            return $query->whereHas($tableName, function ($query) use ($value, $columnName) {
                $query->searchFor($columnName, $value);
            });
        }

        return $query;
    }

    /**
     * Scope a query to search for a date.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string                                $compare
     * @param string                                $date
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearchDate($query, $columnName, $compare = '>=', $date)
    {
        if (!is_null($date)) {
            $validate = Validator::make(['date' => $date], [
                'date' => 'nullable|date',
            ]);

            if ($validate->fails()) {
                return $query->latest();
            }

            $query = $query->whereDate($columnName, $compare, Carbon::parse($date)->format('Y/m/d'));
        }

        return is_null($date) ? $query->latest() : $query->oldest();
    }
}
