<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function username()
    {
        return 'phone';
    }


    /**
    * Handle an authentication attempt.
    *
    * @return Response
    */
   	public function sendLoginResponse(Request $request)
   	{
    	if (!auth()->user()->active) {
    	    auth()->logout();
    	    return redirect('login')->with('error-message', 'You are not an active user');
    	}
    	else{
    		$request->session()->regenerate();

    		$this->clearLoginAttempts($request);

    		return $this->authenticated($request, $this->guard()->user())
    		        ?: redirect()->intended($this->redirectPath());
    	}

    	
   	}

}
