<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property bool is_finished
 * @property  user_id
 */
class Project extends Model
{
    protected $fillable = [
        'name', 'start_date', 'end_date', 'user_id', 'is_finished',
    ];

    protected $table = 'projects';

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
