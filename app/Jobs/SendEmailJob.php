<?php

namespace App\Jobs;

use App\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use Illuminate\Contracts\Mail\Mailer;


/**
 */
class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * Create a new job instance.
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

        foreach ($users as $user)
        {
            Mail::to($user)->send(new SendMailable($user));
        }
    }
}