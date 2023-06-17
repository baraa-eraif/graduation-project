<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()){
            if (str_contains(url()->current(), '/student/'))
                return route('student.login-form');
            elseif (str_contains(url()->current(), '/admin/'))
                return route('admin.login-form');
            elseif (str_contains(url()->current(), '/teacher/'))
                return route('teacher.login-form');
            return route('login');
        }
        return null;
    }
}
