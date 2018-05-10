<?php

namespace App\Jobs;

use App\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use Illuminate\Contracts\Mail\Mailer;


/**
 * @property  users
 */
class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     * @param $users
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @param User $user
     * @return void
     */
//    public function handle()
//    {
//        $users = User::all();
//        foreach ($users as $user)
//        {
//            if (!empty($user->email)) {
//                Mail::to($user->email)->send(new SendMailable($user));
////                $mailer->send('email.index', ['user' => $this->user], function ($m) {
////                    //
////                });
//            }
//        }
//
////        Mail::to('faxtalk666@gmail.com')->send(new SendMailable($user));
//    }

    public function handle()
    {
        $users = User::all();
        $users = $users->filter(function ($item, $key) {
            $item['birthday'] = $this->getBirthday($item->birthday)->format('d.m.Y');
            return $this->getBirthday($item->birthday) < Carbon::now()->endOfDay()->addDays(5) &&
                $this->getBirthday($item->birthday) >= Carbon::now()->startOfDay();
        });
        $users = $users->sortBy(function ($item) {

            return strtotime($item['birthday']);
        })->all();

        foreach ($users as $user)
        {
            if (!empty($user->email))
            {
                Mail::to(User::all()->where('email', '!=', $user->email))->send(new SendMailable($user));
            }
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