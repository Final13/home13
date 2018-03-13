<?php

namespace App\Http\Controllers;

use App\Events;
use App\Role;
use App\User;
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
        $events = Events::get();
        return view('events.index', ['events' => $events]);
    }

    public function addEvent(Request $request)
    {
        $users = User::all();
        return view('events.add', ['users' => $users]);
    }

    public function saveEvent(Request $request)
    {
        $user = Auth::user();

        $event = new Events();
        $event->fill($request->all());
        $event->user_id = $user->id;
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
        $users = User::all();
        return view('events.edit', ['event' => $event], ['users' => $users]);
    }

    public function updateEvent(Request $request)
    {
        $event = Events::find($request->input('id'));
        $event->fill($request->all());
        $event->save();

        return redirect('events/index');
    }

    public function viewEvent(Request $request)
    {
        $event = Events::find($request->route('id'));

        return view('events.view', ['event' => $event]);
    }
}
