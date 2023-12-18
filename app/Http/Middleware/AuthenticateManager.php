<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class AuthenticateManager extends Middleware
{


    protected function authenticate($request, array $guards)
    {

       
            if ($this->auth->guard('halls')->check()) {
                return $this->auth->shouldUse('halls');
            }
        

        $this->unauthenticated($request, ['halls']);
    }
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
}
