<?php

namespace App\Http\Controllers\AuthEmployeur;

// namespace App\Http\Controllers\Auth;

use App\Employeur;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\SessionGuard;




class LoginController extends Controller
{
    

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::EMPLOYEUR;

    // public function __construct()
    // {
    //     $this->middleware('guest:employeur')->except('logout');
    // }
    public function showLoginFormEmployeur(){
        return view('authEmployeur.loginEmployeur');   
    }

    public function guard(){
        return Auth::guard('employeur');
    }

    public function loginEmployeur(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6',
        ]);
        if(Auth::guard('employeur')->attempt(array('email' => $request['email'], 'password' => $request['password']))){
            // return true ;
            return redirect()->intended('Employeur/showProfile');
        }else{
            return redirect()->route('employeur.login')
                ->with('error','Email & Password are incorrect.');
        }     
    }
 

    public function LogoutEmployeur(Request $request)
    {
        Auth::guard('employeur')->logout();
        return view('authEmployeur.loginEmployeur');  
    }

   

  
}
