<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use App\Models\Admin;

use Redirect;
use Auth;

class LoginAdminController extends Controller
{
    use AuthenticatesUsers;

    //Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login_admin');
    }

    //Proses login admin
    protected function login(Request $request)
    {
        //validasi input
        $this->validate($request, [
            'email' => 'required|exists:admin',
            'password' => 'required',
        ], [
            'email.exists' => "Maaf, login gagal",
        ]);

        //proses email dan password untuk login
        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $request->session()->regenerate();
            return Redirect::route('admin.dashboard');
        } else return Redirect::back()->withErrors(['email' => 'Maaf, Login gagal!']);
    }

    //logout admin
    public function logout()
    {
        Auth::guard('admin')->logout();
        return Redirect::route('admin.login');
    }
}
