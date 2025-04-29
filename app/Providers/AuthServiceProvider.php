<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
        // Define admin guard provider to only retrieve admin users
        Auth::provider('admin-users', function ($app, array $config) {
            return new AdminUserProvider($app['hash'], $config['model']);
        });

        // Define user guard provider to only retrieve non-admin users
        Auth::provider('customer-users', function ($app, array $config) {
            return new CustomerUserProvider($app['hash'], $config['model']);
        });
    }
}

/**
 * Custom user provider that only retrieves users with admin role
 */
class AdminUserProvider extends \Illuminate\Auth\EloquentUserProvider
{
    public function retrieveByCredentials(array $credentials)
    {
        $user = parent::retrieveByCredentials($credentials);
        
        if ($user && $user->role === User::ROLE_ADMIN) {
            return $user;
        }
        
        return null;
    }
}

/**
 * Custom user provider that only retrieves users with customer role
 */
class CustomerUserProvider extends \Illuminate\Auth\EloquentUserProvider
{
    public function retrieveByCredentials(array $credentials)
    {
        $user = parent::retrieveByCredentials($credentials);
        
        if ($user && $user->role === User::ROLE_CUSTOMER) {
            return $user;
        }
        
        return null;
    }
} 