<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller{
    public function authenticate(Request $request){
        // Retrive Input
        $credentials = $request->only('nni');

        if (Auth::attempt($credentials)) {
            // if success login

            return redirect('/prendre_rendez_vous');

            //return redirect()->intended('/details');
        }
        // if failed login
        return redirect('login');
    }
}