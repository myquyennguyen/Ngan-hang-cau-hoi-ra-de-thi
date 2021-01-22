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

        Gate::define('view-admin', function($user){
            if($user->MaPhanQuyen == "01"){
                return true;
            }
            return false;
        });
        Gate::define('view-truongbomon', function($user){
            if($user->MaPhanQuyen == '02'){
                return true;
            }
            return false;
        });
        Gate::define('view-giangvien', function($user){
            if($user->MaPhanQuyen == '03' || $user->MaPhanQuyen == '02'){
                return true;
            }
            return false;
        });

        Gate::define('view-thi', function($user){
            if($user->MaPhanQuyen == '04'){
                return true;
            }
            return false;
        });

         Gate::define('view', function($user){
            if($user->name){
                return true;
            }
            return false;
        });

    }
}
