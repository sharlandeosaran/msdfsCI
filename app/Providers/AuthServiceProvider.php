<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('access', function (User $user, $roles) {
            return in_array($user->role->slug, explode('.', $roles));
        });

        Gate::define('local_board', function (User $user, $boards) {
            $chk = false;
            foreach ($user->local_board_array() as $board ) {
                if(in_array($board, explode('.', $boards))) $chk = true;
            }
            return $chk;
        });

        //
    }
}
