<?php

namespace App\Jobs;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use Illuminate\Contracts\Mail\Mailer;

/**
 * @property User user
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
     * @param Mailer $mailer
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $users = User::all();
        foreach ($users as $user)
        {
            if (!empty($user->email)) {
                Mail::to($user->email)->send(new SendMailable());
//                $mailer->send('email.index', ['user' => $this->user], function ($m) {
//                    //
//                });
            }
        }

//        Mail::to('faxtalk666@gmail.com')->send(new SendMailable());
    }

//    public function handle()
//    {
//        Mail::to('faxtalk666@gmail.com')->send(new SendMailable());
//    }
}