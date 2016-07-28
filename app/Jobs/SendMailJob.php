<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailJob extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    private $to_address = "442606286@qq.com";
    /**
     * Create a new job instance.
     *
     * @param  User  $user
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     *
     * @param  Mailer  $mailer
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $mailer->send('email.autoboxing', ['subject'=>'autoboxing'], function ($message) {
            $message->to($this->to_address,"wel")->subject("AutoBoxing");
        });
    }
}