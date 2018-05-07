<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Repositories\UserRepositoryInterface;
use Carbon\Carbon;

/**
 * @property UserRepositoryInterface user
 */
class EmailController extends Controller
{
    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
        $this->middleware('auth');
    }

    public function index()
    {
        $users = $this->user->all();
        $users = $users->filter(function ($item, $key) {
            $item['birthday'] = $this->getBirthday($item->birthday)->format('d.m.Y');
            return $this->getBirthday($item->birthday) < Carbon::now()->endOfDay()->addDays(5) &&
                $this->getBirthday($item->birthday) >= Carbon::now()->startOfDay();
        });

        $users = $users->sortBy(function ($item) {

            return strtotime($item['birthday']);
        })->all();


        return view('email.index', ['users' => $users]);
    }

    public function sendEmail()
    {

//        $emailJob = (new SendEmailJob())->delay(Carbon::now()->addSeconds(3));
//        dispatch($emailJob);
        $users = $this->user->all();
        $users = $users->filter(function ($item, $key) {
            $item['birthday'] = $this->getBirthday($item->birthday)->format('d.m.Y');
            return $this->getBirthday($item->birthday) < Carbon::now()->endOfDay()->addDays(5) &&
                $this->getBirthday($item->birthday) >= Carbon::now()->startOfDay();
        });

        $users = $users->sortBy(function ($item) {

            return strtotime($item['birthday']);
        })->all();

        if ($users > 0)
        {
            $this->dispatch((new SendEmailJob())->delay(3));
        }

    }

    private function getBirthday($value)
    {
        $now = Carbon::now()->startOfDay();
        $date = Carbon::parse($value);
        $date->year = $now->year;
        return $date;
    }
}
