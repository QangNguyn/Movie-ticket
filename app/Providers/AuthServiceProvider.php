<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Module;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {

        $this->registerPolicies();
        $modules = Module::all();
        if ($modules->count() > 0) {
            foreach ($modules as $module) {
                Gate::define($module->name, function (User $user) use ($module) {
                    $roleJson = $user->group->permissions;
                    if (!empty($roleJson)) {
                        $roleArr = json_decode($roleJson, true);
                        $check = isRole($roleArr, $module->name);
                        return $check;
                    }
                    return false;
                });
            }
        }
    }
}