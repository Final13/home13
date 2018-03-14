<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property  user_id
 */
class Events extends Model
{
    protected $fillable = [
        'type', 'start_date', 'end_date', 'user_id',
    ];

    protected $appends = ['start_date', 'end_date'];

    public function getStartDateAttribute($value)
    {
        return Carbon::parse($value)->format('d.m.Y');
    }

    public function getEndDateAttribute($value)
    {
        return Carbon::parse($value)->format('d.m.Y');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}