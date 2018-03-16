<?php

namespace App\Http\Controllers;

use App\Events;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

//        $request->user()->authorizeRoles(['manager']);
        if (Auth::user()->isAdmin()) {
            $events = Events::where('end_date', '>=', Carbon::now())->whereDate("end_date", '<', Carbon::now()->addDays(5))->get();
        } else {
            $events = Events::where('user_id', Auth::user()->id)->where('end_date', '>=', Carbon::now())
                ->whereDate("end_date", '<', Carbon::now()->addDays(5))->get();
        }
        $users = User::get();
        $users = $users->filter(function ($item, $key) {
            $item['birthday'] = $this->getBirthday($item->birthday)->format('d.m.Y');
            return $this->getBirthday($item->birthday) < Carbon::now()->endOfDay()->addDays(5) &&
                    $this->getBirthday($item->birthday) >= Carbon::now()->startOfDay();
        });

        $users = $users->sortBy(function ($item) {

            return strtotime($item['birthday']);
        });

        return view('home', ['events' => $events, 'users' => $users]);
    }

    private function getBirthday($value)
    {
        $now = Carbon::now()->startOfDay();
        $date = Carbon::parse($value);
        $date->year = $now->year;
        return $date;
    }
}
