<?php

namespace App\Livewire\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Logout
{
    /**
     * Log the current user out of the application.
     */
    public function __invoke(): void
    {
        $guard = Auth::getDefaultDriver();
        
        // Only logout the current guard
        Auth::guard($guard)->logout();

        // Regenerate session token instead of invalidating the entire session
        // This preserves any other guard sessions
        Session::regenerateToken();
    }
}
