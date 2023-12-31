<?php

namespace App\Providers;

 use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('isAdmin',function($user){
            return $user->role_id === 1;
        });

        Gate::define('isGroup_admin',function($user){
            return $user->role_id === 2;
        });
        Gate::define('isJustUser',function($user){
            return $user->role_id === 3;
        });
        Gate::define('isOstan',function($user){
            return $user->region_point->region_center->county_id === 9;
        });
        Gate::define('isAbhar',function($user){
            return $user->region_point->region_center->county_id === 2;
        });
        Gate::define('isBimaVagir',function($user){
            return $user->group->id === 4;
        });
        Gate::define('isRiasat',function($user){
            return $user->group->id === 2;
        });
        Gate::define('isGostaresh',function($user){
            return $user->group->id === 3;
        });
        Gate::define('isEnvironment',function($user){
            return $user->group->id === 5;
        });
        Gate::define('isBehvarz',function($user){
            return $user->group->id === 6;
        });
        Gate::define('isKarshenasNazer',function($user){
            return $user->group->id === 8;
        });
        Gate::define('isMarkaz',function($user){
            return (($user->region_point->type_id === 2)||($user->region_point->type_id === 3)||($user->region_point->type_id === 4));
        });
        Gate::define('isBimaGVagir',function($user){
            return $user->group->id === 7;
        });
    }
}
