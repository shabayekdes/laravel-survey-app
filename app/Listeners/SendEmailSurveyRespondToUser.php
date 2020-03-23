<?php

namespace App\Listeners;

use App\Events\SurveyRespond;
use App\Mail\SendSurveyResponseMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailSurveyRespondToUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SurveyRespond  $event
     * @return void
     */
    public function handle(SurveyRespond $event)
    {
        Mail::to($event->survey->email)->send(new SendSurveyResponseMail($event->survey));
    }
}
