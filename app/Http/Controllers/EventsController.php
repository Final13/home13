<?php

namespace App\Http\Controllers;

use App\Events;
use App\Http\Requests\EventRequest;
use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if (Auth::user()->isAdmin()) {
            $events = Events::where('end_date', '>=', Carbon::now())->get();
        } else {
            $events = Events::where('end_date', '>=', Carbon::now())->where('user_id', Auth::user()->id)->get();
        }


        $users = User::get();

        $_events = $users->map(function ($item, $key) {
            $item['type'] = 'Birthday';
            $item['start_date'] = $this->getBirthday($item->birthday);
            $item['end_date'] = $this->getBirthday($item->birthday);
            $item['user'] = $item;

            unset($item['email'], $item['password'], $item['remember_token'], $item['birthday']);

            return $item;
        });

        $events = $events->concat($_events)->sortBy(function ($item) {

            return strtotime($item['end_date']);
        });

        return view('events.index', ['events' => $events]);
    }

    public function addEvent(Request $request)
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'employee');
        })->get();

        return view('events.add', ['users' => $users]);
    }

    public function saveEvent(EventRequest $request)
    {
        $event = new Events();
        $event->fill($request->all());
        $event->save();

        return redirect('events/index');

    }

    public function deleteEvent(Request $request)
    {
        $event = Events::find($request->route('id'));
        $event->delete();

        return redirect('events/index');
    }

    public function editEvent(Request $request)
    {
        $event = Events::find($request->route('id'));
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'employee');
        })->get();

        return view('events.edit', ['event' => $event], ['users' => $users]);
    }

    public function updateEvent(EventRequest $request)
    {
        $event = Events::find($request->input('id'));
        $event->fill($request->all());
        $event->save();

        return redirect('events/index');
    }

    private function getBirthday($value)
    {
        $now = Carbon::now()->startOfDay();
        $date = Carbon::parse($value);
        $date->year = $now->year;
        if ($now > $date) {
            $date->year += 1;
        }
        return $date->format('d.m.Y');
    }
}
