<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Redirect;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //Proses login admin
    protected function login(Request $request)
    {
        //validasi input
        $this->validate($request, [
            'email' => 'required|exists:users',
            'password' => 'required',
        ], [
            'email.exists' => "Maaf, Login gagal",
        ]);

        //proses email dan password untuk login
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $request->session()->regenerate();
            return Redirect::route('admin.dashboard');
        } else return Redirect::back()->withErrors(['email' => 'Maaf, Login gagal!']);
    }
    public function logout()
    {
        Auth::logout();
        return Redirect::route('login');
    }
}
