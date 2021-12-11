<?php

namespace App\Http\Controllers\Auth;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Usuario;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        // return response()->json( $credentials);

    
        if (Auth::attempt($credentials)) {

            $user = Usuario::find(Auth::id());
            $id = $user['id'];
            $request->session()->put('id_usuario',$id);

            return redirect('home');


            
        }else{

            return redirect('login');

        }
        
    }

    public function logout(Request $request)
    {
        
        $request->session()->invalidate();
        
		Auth::guard('web')->logout();
        
        $request->session()->forget('id_usuario');
        		
		
		return redirect('login');
            
		
	}
}
