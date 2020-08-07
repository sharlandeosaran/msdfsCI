<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class ResetPassword implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function handle()
    {
        $user = \App\User::find($this->id);
        if ($user) {
            $subject = 'Reset password for '.$user->name;
            
            $log = new \App\EmailLog;
            $log->subject = $subject;
            $log->details = 'Failed';
            $log->save();
            
            $data = [
                'data' => $user,
            ];
            
            try {
                Mail::send('emails.resetpassword', $data, function($message) use ($user, $subject){
                    $message
                    ->bcc($user->email)
                    ->subject($subject)
                    ;
                });
                
                $log->details = 'Successfully sent reset password to '.$user->name;
                $log->save();
            }
            catch (\Exception $e) {
                $log->details = $e->getMessage();
                $log->save();
            }
        }else{
            $log = new \App\EmailLog;
            $log->subject = 'Email attempt failed for user id# '.$this->id.' RE: password reset';
            $log->details = 'Failed';
            $log->save();
        }
    }
}
