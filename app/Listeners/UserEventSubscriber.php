<?php

namespace App\Listeners;

class UserEventSubscriber
{
    /**
     * Handle user login events.
     */
    public function onUserLogin($event) {
        // log
        $log = new \App\UserLog;
        $log->ip = $_SERVER['REMOTE_ADDR']? $_SERVER['REMOTE_ADDR'] : 'N/A';
        $log->user_id = \Auth::user()->id;
        $log->action = 'Login';
        $log->save();

        // record online status
        $user = \App\User::find(\Auth::user()->id);
        $user->last_online = \Carbon\Carbon::now()->toDateTimeString();
        $user->save();
    }

    /**
     * Handle user logout events.
     */
    public function onUserLogout($event) {
        // log
        $log = new \App\UserLog;
        $log->ip = $_SERVER['REMOTE_ADDR']? $_SERVER['REMOTE_ADDR'] : 'N/A';
        $log->user_id = \Auth::user()->id;
        $log->action = 'Logout';
        $log->save();
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Login',
            'App\Listeners\UserEventSubscriber@onUserLogin'
        );

        $events->listen(
            'Illuminate\Auth\Events\Logout',
            'App\Listeners\UserEventSubscriber@onUserLogout'
        );
    }

}