<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Cookie;

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
    protected function redirectTo(){
        
        if(Auth::user() && Auth::user()->roles =='DOSEN'){
            Auth::logout();
            return view('Auth.loginDosen');
        }
        else{
            // $data = array(
            //     'email' => Auth::user()->email,
            //     'password' => Auth::user()->password
            // );
            // $minutes = 60;
            // Cookie::queue("cookie", $data, $minutes);
            if(Auth::user()->groupid == NULL){
                return '/registergroup';
            }
            else if(Auth::user()->jurusan == NULL){
                return '/profile';
            }
            else{
                return '/home';
            }
            
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {       
        if (Auth::viaRemember()) {
            //
            return view('auth.login');
        }
        $this->middleware('guest')->except('logout');
    }

   
}
