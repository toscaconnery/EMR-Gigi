<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;
use JWTAuth;

class LoginController extends Controller
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
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        // Create JWT token and put it on session
        $jwtToken = $this->getJWTTokenForAPI($request->email, $request->password);
        session()->put('jwtApiToken', $jwtToken);

        if ($user->hasRole('admin')) {
            return redirect('/admin/dashboard');
        }

        elseif ($user->hasRole('staff')) {
            return redirect('/staff/dashboard');
        }

        elseif ($user->hasRole('patient')) {
            return redirect('/patient/dashboard');
        }

        return redirect('/home');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }

    public function getJWTTokenForAPI($email, $password) {
        $credentials = [
            'email' => $email,
            'password' => $password
        ];
        $token = JWTAuth::attempt($credentials);
        return $token;
    }
}
