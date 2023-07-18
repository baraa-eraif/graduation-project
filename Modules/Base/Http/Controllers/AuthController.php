<?php

namespace Modules\Base\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /*
|--------------------------------------------------------------------------
| Login Controller
|--------------------------------------------------------------------------
|
| This controller handles authenticating users for the application and
| redirecting them to your home screen. The controller uses a trait
| to conveniently provide its functionality to your applications.
|
*/

    use AuthenticatesUsers;

    /**
     * return type guard
     */
    public $guard;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public $redirectTo;
    /**
     * return username
     */
    public $username;
    /**
     * return username
     */
    public $login_action;
    /**
     * return middleware
     */
    public $custom_middleware;
    /**
     * default view
     */
    public $login_form = 'auth.login';

    public function __construct()
    {
        $this->middleware($this->custom_middleware)->except('logout');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Login Using Facebook
     */

    public function showLoginForm()
    {
        return $this->collectView();
    }

    public function guard()
    {
        return Auth::guard($this->guard);
    }

    public function username()
    {
        return $this->username;
    }

    public function redirectTo()
    {
        return route($this->redirectTo);
    }

    protected function loggedOut($request)
    {
        return $this->collectView();
    }

    public function collectView()
    {
        return view($this->login_form, [
            'login_action' => $this->login_action,
            'username' => $this->username
        ]);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        Auth::guard($this->guard)->logout();

//        $request->session()->invalidate();
//        $request->session()->regenerateToken();

        return response()->json(array('status' => true
        ,'route' => Arr::first(explode('.',current_route()))));
    }
}
