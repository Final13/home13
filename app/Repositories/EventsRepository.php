<?php

namespace App\Repositories;

use App\Events;

class EventsRepository implements EventsRepositoryInterface
{
    public function all()
    {
        return Events::all();
    }

    public function paginate()
    {
        return Events::paginate(5);
    }

}