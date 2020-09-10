<?php

namespace App\Mail\Application;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Application;

class FormAApplication extends Mailable
{
    use Queueable, SerializesModels;

    public $application;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    // public function __construct()
    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // log email
        $log = new \App\EmailLog;
        $log->subject = 'Form A - Employer/ Employee | email to '.$this->application->name;
        $log->details = 'Failed';
        $log->save();

        try {
            
            $this->
                to($this->application->applicant->email)->
                subject('Form A - Employer/ Employee | ref # '.$this->application->reference_number)->
                view('emails.application.form_a');

            $log->details = 'Sent to '.$this->application->applicant->email;
            $log->save();
        }
        catch (\Exception $e) {
            $log->details = $e->getMessage();
            $log->save();
        }
        
        return;
    }
}
