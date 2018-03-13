<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property  user_id
 */
class Events extends Model
{
    protected $fillable = [
        'type', 'start_date', 'end_date', 'user_id',
    ];
}
