<?php

namespace App\Providers;
use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
         foreach (Permission::all() as $permission) {
            Gate::define($permission->code,function($user) use($permission){
                return $user->role->permissions()->where('code',$permission->code)->exists();
            });
        }
    }
}
