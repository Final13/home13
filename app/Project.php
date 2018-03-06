<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'start_date', 'end_date', 'user_id', 'is_finished',
    ];

    protected $table = 'projects';
}
