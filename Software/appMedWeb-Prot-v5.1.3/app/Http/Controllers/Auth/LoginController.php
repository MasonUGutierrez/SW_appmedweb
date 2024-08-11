<?php

namespace appMedWeb\Http\Controllers\Auth;

use Illuminate\Http\Request;
use appMedWeb\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

use Auth;
use appMedWeb\Models\User;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    // 
    public function __construct(){
        $this->middleware('guest',['only'=>'showLoginForm']);
    }

    public function showLoginForm(){
        return redirect()->route('home');
    }

    public function login(Request $request){

        /*Reglas de validacion de los campos*/
        $this->validate($request, [
            $this->username() => 'required|string|max:25',
            'password' => 'required|string|max:25',
            // 'Rol' => 'required|max:1',
        ]);
        $credentials = [];
        $credentials[$this->username()] = $request->get($this->username());
        $credentials['password'] = $request->get('password');
        // $credentials['Rol'] = $request->get('Rol');
        
        if (Auth::attempt($credentials))
        {
            switch (Auth()->user()->Rol) {
                 case 'A':
                     return Redirect::to(url('admin'));
                     break;
                 case 'P':
                     return Redirect::to(url('padmin'));
                     break;
                 default:
                     return Redirect::to(url('medico'));
                     break;
             } ;            
        }
        return back()->withErrors([$this->username()=>'Usuario no existente','password'=>'O Contraseña invalida'])
            ->withInput(request([$this->username()]));
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
    public function username(){
        return 'name';
    }
}
