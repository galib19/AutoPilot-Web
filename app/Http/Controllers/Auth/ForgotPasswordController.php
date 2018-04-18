<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

use Illuminate\Http\Request;

use Validator;
use App\AsfOption;
use App\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;

class ForgotPasswordController extends Controller
{


	protected $phone_number;
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use HasApiTokens, SendsPasswordResetEmails;



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    

    /**
	
		Forgot password with Phone

    **/
    // Show Forgot Password Form 
    public function showForgotPasswordForm(){
    	
    	return view('auth.passwords.phone');

    }

    //Forgot Password Send OTP
    public function sendResetOTPPhone(Request $request){


    	$validator = Validator::make($request->all(), [
    	    'phone'         => 'required|regex:/(01)[0-9]{9}/|size:11',
    	]);


    	$check_phone_exists = Validator::make($request->all(), [
    		'phone'         => 'unique:users,phone',
    	]);

    	
    	if(!$validator->fails()){
    		if( $check_phone_exists->fails() ){

    			$otp = rand(1000, 9999);


    			$all_options = new AsfOption;

    			//Session::put( [ $request->phone .'_OTP' => $otp, $request->phone .'_OTPTime' => date_timestamp_get(now()) ] );

    			// $all_options->option_name = 'otp_' . $request->phone;
    			// $all_options->option_value = $otp;

    			$all_options->updateOrCreate(
    				['option_name' => 'otp_' . $request->phone],
    				[ 'option_name' => 'otp_' . $request->phone, 'option_value' => $otp ]
    			);

    			

    			// Send OTP to mobile

    			
    			return view('auth.passwords.otp', ['phone' => $request->phone]);

    			// return redirect()->route('password.otp')->with('phone', $request->phone);

    		}
    		else{
    			return redirect()->route('password.phone')->with('status', 'Phone number is not Authenticated');
    		}
    	}
    	else{
    		$errors = $validator->errors();
    		return redirect()->route('password.phone')->with('status', $errors);
    	}

    }


    //Forgot Password Verify OTP
    public function verifyOTPPhone(Request $request){

    	$validator = Validator::make($request->all(), [
    	    'otp'         		=> 'required|integer|digits:4',
    	    'phone'         	=> 'required|regex:/(01)[0-9]{9}/|size:11',
    	]);


    	if(!$validator->fails()){

    		//$time_to_check_now  = date('H:i');

    		$time_to_check  = date('H:i', strtotime('-4 minutes'));

    		$all_options = AsfOption::where('option_name', 'like', 'otp_'. $request->phone)->whereTime('updated_at', '>', $time_to_check )->first(['option_value']);


    		if( isset($all_options->option_value) && $all_options->option_value != null && $all_options->option_value === $request->otp ){

    			return view('auth.passwords.resetform')->with(['token' => $request->_token, 'phone' => $request->phone]);

    		}
    		else{
    			return redirect()->route('password.phone')->with('status', 'OTP does not match or Expired');
    		}
    		
    	}
    	else{
    		// return $validator->errors();
    		return redirect()->route('password.otp')->with('status', $validator->errors());
    	}

    }



    // Reset/ Regenerate password
    public function resetPasswordPhone(Request $request){

    	$this->validate($request, 
    		[
            	'token' 		=> 'required',
            	'phone'         => 'required|regex:/(01)[0-9]{9}/|size:11',
            	'password' 		=> 'required|confirmed|min:6',
        	], 
    		$this->validationErrorMessages());

	    	$user = User::where('phone', $request->phone)->first();


	    	$user->password = Hash::make($request->password);

	    	$user->setRememberToken(Str::random(60));

	    	$token = $user->createToken('newToken2')->accessToken;


	    	$user->save();


	    	event(new PasswordReset($user));

	    	//$this->guard()->login($user);

	    	return redirect()->route('login')->with('status', 'Login with new password');
    	

    }


    protected function credentials_phone(Request $request)
    {
        return $request->only(
           'phone', 'password', 'password_confirmation', 'token'
        );
    }


    protected function validationErrorMessages()
    {
        return [];
    }
    

    


    protected function guard()
    {
        return Auth::guard();
    }

}
