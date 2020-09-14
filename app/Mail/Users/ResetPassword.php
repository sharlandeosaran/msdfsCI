<?php

namespace App\Mail\Users;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    // public function __construct()
    public function __construct(User $user)
    {
        $this->user = $user;
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
        $log->subject = 'Reset password for '.$this->user->name;
        $log->details = 'Failed';
        $log->save();

        try {
            
            $this->
                to($this->user->email)->
                subject('Reset password for '.$this->user->name)->
                view('emails.users.resetpassword');

            $log->details = 'Sent to '.$this->user->email;
            $log->save();
        }
        catch (\Exception $e) {
            $log->details = $e->getMessage();
            $log->save();
        }
        
        return;
    }
}
