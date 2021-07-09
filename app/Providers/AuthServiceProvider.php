<?php

namespace App\Providers;

use App\Models\ConnectedAccount;
use App\Policies\ConnectedAccountPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        ConnectedAccount::class => ConnectedAccountPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('stuff', function ($user) {
            return $user->hasRole('stuff');
        });

        Gate::define('developer', function ($user) {
            return $user->hasRole('developer');
        });

//        Gate::define('stuff', function ($user) {
//            return $user->hasRole('stuff');
//        });

    }
}
