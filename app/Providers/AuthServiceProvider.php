<?php

namespace App\Providers;

use App\Policies\admPolicy;
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

        Gate::define('eBaru', [admPolicy::class, 'viewEbaru']); //belum punya hak akses
        Gate::define('ePdrt', [admPolicy::class, 'viewEpendampingrt']);
        Gate::define('eKorkel', [admPolicy::class, 'viewEkorkel']);
        Gate::define('eKorcam', [admPolicy::class, 'viewEkorcam']);
        Gate::define('eKorkot', [admPolicy::class, 'viewEkorkot']);
        Gate::define('eOpd', [admPolicy::class, 'viewEopd']);
        Gate::define('eSuperAdmin', [admPolicy::class, 'viewEsuperadmin']);
    }
}
