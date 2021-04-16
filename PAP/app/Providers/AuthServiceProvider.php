<?php

namespace App\Providers;

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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin',function($user){
            if($user->tipo_user=='admin'){
                return true;
            }
            else{
                return false;
            }
        });


        Gate::define('papelaria',function($user){
            if($user->tipo_user=='papelaria'){
                return true;
            }
            else{
                return false;
            }
        });

        Gate::define('bar',function($user){
            if($user->tipo_user=='bar'){
                return true;
            }
            else{
                return false;
            }
        });

        Gate::define('portaria',function($user){
            if($user->tipo_user=='portaria'){
                return true;
            }
            else{
                return false;
            }
        });
    }
}
