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
        // \Mail::send(new \App\Mail\Application\Approved(\App\Application::first()));
        // \Mail::send(new \App\Mail\Application\Rejection(\App\Application::first()));
        // \Mail::send(new \App\Mail\Application\FormAApplication(\App\Application::first()));
        // \Mail::send(new \App\Mail\Application\FormBApplication(\App\Application::first()));
        // \Mail::send(new \App\Mail\Application\FormCIApplication(\App\Application::first()));
        // \Mail::send(new Test);

        dd("sent! ".msTimeStamp());
    }
}