<?php

namespace App\Http\Controllers\Mail;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Mail;
use App\Mail\Test;

class MailController extends Controller
{
    public function mailtest()
    {
        \Mail::send(new Test);
        // \Mail::send(new \App\Mail\Approval\Inbound\TravelArrangements(\App\Application::first()));

        dd("sent! ".msTimeStamp());
    }
}