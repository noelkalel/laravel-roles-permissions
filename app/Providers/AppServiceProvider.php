<?php

namespace App\Providers;

use App\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    { 
        $permissions = Permission::all();
        
        foreach($permissions as $permission){
            // dd($permission->pluck('name')->toArray());
            Gate::define($permission->name, function ($user) use ($permission){
                // dd($permission->name, $user->name);
                return $user->hasPermissionTo($permission);
            });
        }
    }
}
