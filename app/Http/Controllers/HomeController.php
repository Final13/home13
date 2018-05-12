<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Repositories\EventsRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

/**
 * @property UserRepositoryInterface user
 * @property EventsRepositoryInterface events
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param UserRepositoryInterface $user
     * @param EventsRepositoryInterface $events
     */
    public function __construct(UserRepositoryInterface $user, EventsRepositoryInterface $events)
    {
        $this->user = $user;
        $this->events = $events;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $request->user()->authorizeRoles(['manager']);
        if (Auth::user()->isAdmin()) {
            $events = $this->events->getEventsForAdmin();
        } else {
            $events = $this->events->getEventsForUser();
        }
//        $users = $this->user->all();
//        $users = $users->filter(function ($item, $key) {
//            $item['birthday'] = $this->getBirthday($item->birthday)->format('d.m.Y');
//            return $this->getBirthday($item->birthday) < Carbon::now()->endOfDay()->addDays(5) &&
//                    $this->getBirthday($item->birthday) >= Carbon::now()->startOfDay();
//        });

        $users = User::
            whereDay('birthday', '<=', Carbon::now()->endOfDay()->addDays(5)->day)
            ->whereDay('birthday', '>=', Carbon::now()->startOfDay()->day)
            ->whereMonth('birthday', '<=', Carbon::now()->endOfDay()->addDays(5)->month)
            ->whereMonth('birthday', '>=', Carbon::now()->startOfDay()->month)
            ->get();



        $users = $users->filter(function ($item, $key) {
            $item['birthday'] = $this->getBirthday($item->birthday)->format('d.m.Y');
            return $item;
        });
//        $birthdayUsers = User::GetBirthdayUsersForMailing(5)->get();
//
//        $notifyUsers = User::GetNotifyUsersForMailing(5)->get();
//        dd($birthdayUsers);
//        $users = $users->sortBy(function ($item) {
//
//            return strtotime($item['birthday']);
//        })->all();

        if (!empty($users))
        {
//            $job = (new SendEmailJob())
//            ->delay(Carbon::now()->addSecond());
//            $this->dispatch($job);
            $this->dispatch((new SendEmailJob())->delay(Carbon::now()->addSeconds(3)));
        }

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
