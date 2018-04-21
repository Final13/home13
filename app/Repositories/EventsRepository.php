<?php

namespace App\Repositories;

use App\Events;
use App\Http\Requests\EventRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function findProjectById($id)
    {
        return Events::find($id);
    }

    public function findProjectByInputId($id)
    {
        return Events::find($id);
    }

    public function getFutureEvents()
    {
        return Events::where('end_date', '>=', Carbon::now())->get();
    }

    public function getFutureEventsByUserId()
    {
        return Events::where('end_date', '>=', Carbon::now())
            ->where('user_id', Auth::user()->id)->get();
    }

    public function getEventsForAdmin()
    {
        return Events::where('end_date', '>=', Carbon::now())
            ->whereDate("end_date", '<', Carbon::now()->addDays(5))->get();
    }

    public function getEventsForUser()
    {
        return Events::where('user_id', Auth::user()->id)->where('end_date', '>=', Carbon::now())
            ->whereDate("end_date", '<', Carbon::now()->addDays(5))->get();
    }

    public function saveEvent($inputs)
    {
        $event = new Events();
        $event->fill($inputs);
        $event->save();

        return $event;

    }

    public function updateEvent($inputs)
    {
        $event = $this->findProjectByInputId($inputs)->first();
        $event->fill($inputs);
        $event->save();

        return $event;
    }
}