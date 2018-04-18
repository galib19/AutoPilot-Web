<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

use App\CaseIncedent;
use App\CaseMeta;
use App\CaseVictim;
use App\UserMeta;
use App\AsfOption;
use App\CaseComment;

use Illuminate\Validation\Rule;

use File;
use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Backend\UploadController as UploadFile;

use Closure;


class PassportController extends Controller
{

    public $successStatus = 200;
    protected $case_status = 'new';
    protected $uploadPath;
    protected $uploadUrl;


    public function __construct()
    {
        $this->uploadPath = public_path(config('cms.uploads.directory'));
        $this->uploadUrl = url('/uploads');
    }


    private function uploadFile(){

    	return $uploadFile = new uploadFile;
    }


    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){

        if(Auth::attempt(['phone' => request()->input('phone'), 'password' => request()->input('password'), 'active' => 1])){

            $user = Auth::user();

            $success['token'] =  $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        }
        else{
            return response()->json(['error'=>'Bad Request'], 400);
        }
    }

    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['id'] =  $user->id;

        return response()->json(['success'=>$success], $this->successStatus);
    }

    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function userMe()
    {
        $user = Auth::user();


        //$user_meta = User::with('usermeta')->find($user->id);

        //CaseMeta::where('case_id', '=', $id)->where('meta_key', 'like', $value['meta_key'])

        $user_metas = UserMeta::where('user_id', $user->id)->get(['meta_key', 'meta_value'])->toArray();

        //dd($user_meta);

        
        $destination_url = $this->uploadUrl;

        $user_meta_data = array();

        foreach ($user_metas as $user_meta) {

        	if( $user_meta['meta_key'] == 'profile_pic' ){

        		$profile_pic_thumb_url = unserialize($user_meta['meta_value']);


        		$user_meta_data[$user_meta['meta_key']] = ( !empty($profile_pic_thumb_url) ? $this->uploadUrl . $profile_pic_thumb_url['url_thumb'] : null );
        	}
        	else{
        		$user_meta_data[$user_meta['meta_key']] = ( !empty($user_meta['meta_value']) ? $user_meta['meta_value'] : null );
        	}

        }


        $combine_array = array_merge( $user->toArray(), $user_meta_data );

        if( !empty($user) && $user != null){
        	return response()->json(['success' => $combine_array], $this->successStatus);
        }
        else{
        	return response()->json(['error'=>'Not Found'], 404);
        }
        
    }


    public function userEdit(Request $request)
    {
        $user = Auth::user();

        //dd($request->all());

        //$user_meta = User::with('usermeta')->find($user->id);

        //CaseMeta::where('case_id', '=', $id)->where('meta_key', 'like', $value['meta_key'])

        $validator = Validator::make($request->all(), [
            'name' 			=> 'required|string',
            'email' 		=> 'email',
            'designation' 	=> 'string',
            'profile_pic.0'  	=> 'mimes:jpg,jpeg,bmp,png|max:10240',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }


        $user_data = User::find($user->id);


        $user_data->name = $request->name;
        $user_data->email = $request->email;

        $user_data->save();


        $user_meta_data = array();

        if( !empty($request->input('designation')) ){
        	$user_meta_data['designation'] = $request->input('designation');
        }


        $profile_pic = $request->file('profile_pic');

        if( !empty($profile_pic) ){

	        $profile_pic = array_first($profile_pic);
	        $fianl_profile_pic =  null;

	        if( is_object($profile_pic) ){
	        	$fianl_profile_pic = $this->uploadFile()->single_upload_file($profile_pic, true, 'profile_thumb');
	        }

	        $user_meta_data['profile_pic'] = $fianl_profile_pic;
        }



        if( isset($user_meta_data) && !empty($user_meta_data) ){

        	foreach ($user_meta_data as $key => $value) {

        		UserMeta::updateOrCreate(
        			// Find match
        			array('user_id' => $user->id, 'meta_key' => $key), 
        			// Change value
        			array('meta_value' => !empty($value) ? $value : null )
        		);

        	}

        }

        return response()->json(['success' => 'profile Update Successfully'], $this->successStatus);
        
    }


    public function mostRecent()
    {
        $user = Auth::user();

        $cases = CaseIncedent::where('user_id', $user->id)->latest()->first();


        if( empty($cases) && $cases == null ) {

        	$no_case_array = array();

        	$no_case_array['data'] = [];
            //return response()->json(['success'=> 'No Case Available'], $this->successStatus);
            return response()->json(['success' => $no_case_array], $this->successStatus);        
        }


        $cases = $cases->toArray();

        // cases action taken
        $all_action_taken = $this->cases_action_taken($cases);

        if( !empty($all_action_taken) ){

        	$cases['action_taken'] = $all_action_taken;

        }


        $cases_with_victim = $this->caseDetailsWithVictim($cases);

        $final_cases_last = $this->caseDetailsWithMeta( $cases_with_victim );

        $total_comments = $this->totalCommentsByCaseId($final_cases_last['id']);

        $final_cases_last['total_comments'] = $total_comments;

        $final_new_array_data['data'][] = $final_cases_last;
        

        if( !empty($cases) && $cases != null ){
        	return response()->json(['success' => $final_new_array_data], $this->successStatus);
        }
        else{
        	return response()->json(['error'=>'Not Found'], 404);
        }


        
    }


    public function totalCases()
    {
        $user = Auth::user();

        $cases = CaseIncedent::where('user_id', $user->id)->latest()->paginate(10)->toArray();

        
        $final_cases = array();
        $final_cases_two = array();
        $final_cases_three = array();

        foreach ($cases['data'] as $key => $value) {

        	// Cases action
        	$all_action_taken = $this->cases_action_taken($value);

        	if( !empty($all_action_taken) ){

        		$value['action_taken'] = $all_action_taken;

        	}

        	
        	$final_cases = $this->caseDetailsWithVictim($value);

        	// Add Total comments
        	$total_comments = $this->totalCommentsByCaseId($value['id']);
        	$final_cases['total_comments'] = $total_comments;

        	$final_cases_two[] = $this->caseDetailsWithMeta( $final_cases );

        }

        $final_cases_last = array_merge( $cases, array('data' => $final_cases_two ));
        

        
        if( !empty($cases) && $cases != null ){
        	return response()->json(['success' => $final_cases_last], $this->successStatus);
        }
        else{
        	return response()->json(['error'=>'Not Found'], 404);
        }

    }


    // Cases action taken 
    private function cases_action_taken($cases){

    	if( empty($cases) ){
    		return;
    	}

    	$cases_all_action_taken = $cases['action_taken'];

        if( !empty($cases_all_action_taken) ){

        	$cases_all_action_taken = str_replace(array('[', ']'), '', $cases_all_action_taken);

        	$cases_all_action_taken = explode(',', $cases_all_action_taken);

        	$all_asf_action_taken = AsfOption::where('option_name', 'like', 'action_taken')->first(['option_value']);

        	$all_asf_action_taken_2 = unserialize($all_asf_action_taken->option_value);

        	$new_action_taken_array = array();
        	$new_action_taken_array_last = array();

        	foreach ($cases_all_action_taken as $key => $value) {
        		
        		$new_action_taken_array['id'] = $value;
        		$new_action_taken_array['name'] = isset($all_asf_action_taken_2[$value]) ? $all_asf_action_taken_2[$value] : null;

        		$new_action_taken_array_last[] = $new_action_taken_array;

        	}

        	return $new_action_taken_array_last;

        }
        else{
        	return;
        }

    }


    public function createCase(Request $request)
    {
        $user = Auth::user();

        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'case_title'        	=> 'required|string',
            'case_details'         	=> 'required',
            //'case_status'         	=> 'string',
            'case_type'         	=> 'required|string',
            'incident_date'  		=> 'required',
            'name'  				=> 'required|string',
            'parents'  				=> 'required',
            'location'  			=> 'required',
            'age'  					=> 'required|integer',
            'sex'  					=> ['required', Rule::in(['man', 'woman', 'girl', 'boys', 'others'])],
        ]);



        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $data = $this->handleRequest($request);

        $data['case_status'] = $this->case_status;

        $data = Auth::user()->cases()->create($data);

        //$data = Auth::user()->casevictim()->create($data_victim);

        $data_victim = $this->handleVictimRequest($request, $data->id);


        if( isset($data_victim) && !empty($data_victim) ){
        	CaseVictim::insert($data_victim);
        }

        //dd($data_victim);
        

        $other_fields = $this->saveOtherField($request, $data->id);


        if( isset($other_fields) && !empty($other_fields) ){
        	CaseMeta::insert($other_fields);
        }


        return response()->json(['success' => 'Cases Created Successfully'], $this->successStatus);
        
    }


    private function handleRequest($request)
    {

    	$data['case_title'] = $request->input('case_title');
    	$data['case_details'] = $request->input('case_details');
    	$data['case_type'] = $request->input('case_type');
    	$data['incident_date'] = $request->input('incident_date');
    	$data['action_taken'] = $request->input('action_taken');

    	

        //$data = $request->all();

        return $data;
    }

    private function handleVictimRequest($request, $case_id){

    	$data_case_victim = array();

    	if(isset($case_id) && !empty($case_id)){
    		$data_case_victim['case_id'] = $case_id;
    		$data_case_victim['name'] = $request->input('name');
    		$data_case_victim['parents'] = $request->input('parents');
    		$data_case_victim['location'] = $request->input('location');
    		$data_case_victim['age'] = $request->input('age');
    		$data_case_victim['sex'] = $request->input('sex');
    	}

    	return $data_case_victim;

    }




    // Save additional field to case meta 
    private function saveOtherField($request, $id){

    	$data_other_field = $request->except(['case_title', 'case_details', 'name', 'parents', 'location', 'age', 'sex', 'case_status', 'user_id', 'incident_info', 'case_type', 'incident_date', 'action_taken' ]);


    	$newArrayFieldNormal = array();
    	$newArrayFieldFiles = array();

    	$newArrayFieldMultiFiles = array();

    	foreach ($data_other_field as $key => $value) {


    		if( $key == 'multi_files' ){
    			
    			$newArrayFieldMultiFiles = $this->saveOtherFieldMultiFiles($request, $id, $key, $value );

    		}
    		elseif( is_object($value) ){

    			$newArrayFieldFiles[] = $this->saveOtherFieldfiles($request, $id, $key, $value );

    		}
    		else{
    			$newArrayFieldNormal[] = $this->saveOtherFieldNormal($request, $id, $key, $value );
    		}

    	}


    	//dd($newArrayFieldFiles);

    	$allFieldWithImage2 = array_merge($newArrayFieldNormal, $newArrayFieldMultiFiles);

    	$allFieldWithImage = array_merge($allFieldWithImage2, $newArrayFieldFiles);

    	//print_r($allFieldWithImage);

    	
    	return $allFieldWithImage;

    }


    // Get Additional Normal Field to Case meta
    private function saveOtherFieldNormal($request, $case_id, $key, $value){

    	$new_other_filed = array();

    	if(isset($key) && !empty($key)){
    		$new_other_filed['case_id'] = $case_id;
    		$new_other_filed['user_id'] = $request->user()->id;
    		$new_other_filed['meta_key'] = $key;
    		$new_other_filed['meta_value'] = ( !empty($value) ? $value : null );

    		//array_push($newNormalField, $new_other_filed );
    	}

    	return $new_other_filed;
    }


    // Save attachment multiple file and image request as array
    private function saveOtherFieldMultiFiles($request, $case_id, $key, $value){
    	
    	$new_multi_files_array = array();

    	

    	$all_multi_files = $request->file('multi_files');

    	if ( is_array($all_multi_files) ) {
    		
    	
	    	$destination = $this->uploadPath;


			foreach ($all_multi_files as $key => $value) {


				$fileValidate = Validator::make($request->file(), 
					[
			           //$key => 'mimes:jpg,jpeg,bmp,png|max:10240',
			           $key => 'max:10240',
			       	]
				);

				//$file_valid_extensions = $this->checkFileMimeType($value);

				if( $this->checkFileMimeTypeImage($value) ){
					$is_file = '_images-';
				}
				else{
					$is_file = '_other-';
				}

				//$is_file = $this->checkFileMimeTypeImage($value) ? .'_images-'. : .'-';


				if( !$fileValidate->fails() && ( $this->checkFileMimeTypeImage($value) || $this->checkFileMimeTypeFiles($value) ) ){

					$file = $value->getClientOriginalName();

					$extension = $value->getClientOriginalExtension();

					$file_name_modified = str_replace(' ', '-', strtolower($file));

					$file_name_modified = preg_replace('/[^A-Za-z0-9\. -]/', '', $file_name_modified);

					$fileName = time().'_'.$file_name_modified;



					$file_path = "/" . date("Y") . '/' . date("m") . "/";

					
					$fileDatePath = $destination . $file_path;


					if (! File::exists($fileDatePath)) {
					    File::makeDirectory($fileDatePath, 0777,true);
					}

					$successUploaded = $value->move($fileDatePath, $fileName);

					if($successUploaded){

						
						//if( $this->checkFileMimeTypeImage($value) ){}

					    // $width     = config('cms.image.thumbnail.width');
					    // $height    = config('cms.image.thumbnail.height');
					    // //$extension = $image->getClientOriginalExtension();
					    // $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName);

					    // Image::make($fileDatePath . $fileName)
					    //     ->resize($width, $height)
					    //     ->save($fileDatePath . '/' . $thumbnail);

					    //$new_image_array[$key] = $file_path . $fileName;



					    $new_image_array_single['case_id'] = $case_id;
					    $new_image_array_single['user_id'] = Auth::user()->id;
					    $new_image_array_single['meta_key'] = 'multi_files'. $is_file . $key;
					    $new_image_array_single['meta_value'] = ( !empty($file_path . $fileName) ? $file_path . $fileName : null );

					    array_push($new_multi_files_array, $new_image_array_single );

					}

				}
				// else{
				// 	return response()->json(['error'=>'File size limit exceeded'], 404);
				// }

			} // foreach


		} //is_array (condition)


		return $new_multi_files_array;
    }



    // Get Additional Files Field to Case meta
    private function saveOtherFieldfiles($request, $case_id, $key, $value){

    	

    	// For image file check
    	$new_image_array = array();

    	if ( $request->file($key) != null && !empty($request->file($key)) )
    	{

    		$destination = $this->uploadPath;


    		
			$fileValidate = Validator::make($request->file(), 
				[
		           //$key => 'mimes:jpg,jpeg,bmp,png|max:10240',
		           $key => 'max:102400',
		       	]
			);

			//$file_valid_extensions = $this->checkFileMimeType($value);




			if( $this->checkFileMimeTypeImage($value) ){
				$is_file = 'single_file_image-';
			}
			else{
				$is_file = 'single_file_other-';
			}



			if( !$fileValidate->fails() && ( $this->checkFileMimeTypeImage($value) || $this->checkFileMimeTypeFiles($value) ) ){


				$file = $value->getClientOriginalName();

				$extension = $value->getClientOriginalExtension();

				$file_name_modified = str_replace(' ', '-', strtolower($file));

				$file_name_modified = preg_replace('/[^A-Za-z0-9\. -]/', '', $file_name_modified);

				$fileName = time().'_'.$file_name_modified;

				$file_path = "/" . date("Y") . '/' . date("m") . "/";

				
				$fileDatePath = $destination . $file_path;


				if (! File::exists($fileDatePath)) {
				    File::makeDirectory($fileDatePath, 0777,true);
				}

				$successUploaded = $value->move($fileDatePath, $fileName);

				if($successUploaded){

					
				    // $width     = config('cms.image.thumbnail.width');
				    // $height    = config('cms.image.thumbnail.height');
				    // //$extension = $image->getClientOriginalExtension();
				    // $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName);

				    // Image::make($fileDatePath . $fileName)
				    //     ->resize($width, $height)
				    //     ->save($fileDatePath . '/' . $thumbnail);

				    //$new_image_array[$key] = $file_path . $fileName;

				    $new_image_array_single['case_id'] = $case_id;
				    $new_image_array_single['user_id'] = $request->user()->id;
				    $new_image_array_single['meta_key'] = $is_file . $key;
				    $new_image_array_single['meta_value'] = ( !empty($file_path . $fileName) ? $file_path . $fileName : null );

				    return $new_image_array_single;

				}


			}


    	}
    }


    // Check File Mimie Type for validation
    private function checkFileMimeTypeImage( $filename ){

    	$check_valid_mime_type = false;

    	$all_valid_mime_type = [
    		'image/png', 
    		'image/jpeg', 
    		'image/gif', 
    		'image/bmp',
    		'application/octet-stream',
    	];

    	$file_mime_type = $filename->getMimeType();

    	$check_valid_mime_type = in_array($file_mime_type,  $all_valid_mime_type);

    	return $check_valid_mime_type;
    }


    // Check File Mimie Type for validation
    private function checkFileMimeTypeFiles( $filename ){

    	$check_valid_mime_type = false;

    	$all_valid_mime_type = [
    		'application/pdf',
    		'application/msword',
    		'application/vnd.ms-excel',
    		'application/zip'
    	];

    	$file_mime_type = $filename->getMimeType();

    	$check_valid_mime_type = in_array($file_mime_type,  $all_valid_mime_type);

    	return $check_valid_mime_type;
    }


    // Check Request value array or object for files
    // private function checkRequestValue($value){

    // 	if( is_object($value) ){

    // 		return true;
    // 	}
    // 	else{
    // 		return false;
    // 	}

    	

    // }


    // private function checkRequestFileType($file){

    // 	if( !empty($file) && $file != null && is_object($file) ){

    // 		$all_valid_mime_type = [
    // 			'image/png', 
    // 			'image/jpeg', 
    // 			'image/gif', 
    // 			'image/bmp',
    // 			'application/pdf',
    // 			'application/msword',
    // 			'application/vnd.ms-excel',
    // 			'application/zip'
    // 		];

    // 		$fileMimeType = $file->getMimeType();

    // 		$check_valid_mime_type = in_array($fileMimeType,  $all_valid_mime_type);

    // 		return $check_valid_mime_type;

    // 	}
    // 	else{
    // 		return;
    // 	}

    // }



    //Case details show
    public function caseDetails($id){

    	$user = Auth::user();

    	$cases = CaseIncedent::where('user_id', $user->id)->find($id);

    	//$cases_meta = CaseIncedent::with('casemeta')->find($id);

    	//dd($cases);
    	

    	if( !empty($cases) && $cases != null ){

    		$cases = $cases->toArray();

    		$final_cases = $this->caseDetailsWithVictim($cases);
    		$final_cases_last = $this->caseDetailsWithMeta($final_cases);

    		return response()->json(['success' => $final_cases_last], $this->successStatus);
    	}
    	else{
    		return response()->json(['error'=>'Not Found'], 404);
    	}

    	//return View::make('backend.case.show', ['cases' => $cases, 'cases_meta' => $cases_meta]);

    }

    // Cases with victim data
    private function caseDetailsWithVictim($cases){

    	$cases_victim = CaseVictim::where('case_id', $cases['id'])->get([ 'id', 'name', 'parents', 'location', 'age', 'sex'])->toArray();

    	//$cases_to_array = $cases->toArray();

    	$final_cases_last = array_merge($cases, array('victims' => $cases_victim));

    	return $final_cases_last;

    }

    // Cases with attachemnt meta
   	private function caseDetailsWithMeta($cases){

   		$cases_meta = CaseMeta::where('case_id', $cases['id'])->get([ 'id', 'meta_key', 'meta_value'])->toArray();

   		$destination_url = $this->uploadUrl;

   		$other_fields = array();
   		$multiple_files_image = array();
   		$new_multiple_files_image = array();

   		foreach ($cases_meta as $key => $value) {
   			
   			$str_to_check = 'multi_files';

   			$multi_files_str = $value['meta_key'];

   			$pos_check = stripos($multi_files_str, $str_to_check);


   			if( $pos_check !== false ){
   				
   				$multiple_files_image['AttachmentId'] = $value['id'];
   				$multiple_files_image['Url'] = $destination_url . $value['meta_value'];

   				$new_multiple_files_image[] = $multiple_files_image;
   			}
   			else{
   				$other_fields[$value['meta_key']] = $value['meta_value'];
   			}

   		}

   		

   		//$cases_to_array = $cases->toArray();

   		$final_cases_last = array_merge($cases, array('attachement' => $new_multiple_files_image, 'other_filed' => $other_fields));

   		return $final_cases_last;

   	} 




   	public function changePassword(Request $request) {
   	     $data = $request->json()->all();

   	     //$user = Auth::guard('api')->user();
   	     $user = Auth::user();

   	     //Changing the password only if is different of null
   	     if( isset($data['old_password']) && !empty($data['old_password']) && $data['old_password'] !== "" && $data['old_password'] !=='undefined') {
   	         //checking the old password first
   	         $check  = Auth::guard('web')->attempt([
   	             'phone' => $user->phone,
   	             'password' => $data['old_password']
   	         ]);

   	         
   	         if($check && isset($data['new_password']) && !empty($data['new_password']) && $data['new_password'] !== "" && $data['new_password'] !=='undefined') 
   	         {
   	         	//dd( $data['new_password'] );
   	             $user->password = bcrypt($data['new_password']);
   	             //$user->isFirstTime = false; //variable created by me to know if is the dummy password or generated by user.
   	             //$user->token()->revoke();

   	             //$token = $user->createToken('newToken')->accessToken;

   	             //Changing the type
   	             $user->save();

   	             //return json_encode(array('token' => $token)); //sending the new token
   	             return response()->json(['success' => 'Password changed Successfully'], $this->successStatus);
   	         }
   	         else {
   	             return response()->json(['error'=>'Wrong password information'], 404);
   	         }
   	     }
   	     
   	     return response()->json(['error'=>'Wrong password information'], 404);
   	 }


   	 // logout api
   	 public function logout() {
   	     
   	     $user = Auth::user();

   	    $user_fcm = User::findOrFail($user->id);

   	    $user_fcm->fcm_token = null;
   	    $user_fcm->device = null;

   	    $user_fcm->save();

   	    $user->token()->revoke();
   	     
   	    return response()->json(['success'=>'Logout successfull'], $this->successStatus);
   	 }


   	 // Asf settings api
   	 public function asfSettings(){

   	 	$settings = array();

   	 	$new_value_array = array();
   	 	
   	 	$new_final_value_array = array();

   	 	$settings['violence_type'] = $this->getAsfSettings('violence_type');
   	 	$settings['action_taken'] = $this->getAsfSettings('action_taken');

   	 	//$titles = DB::table('asf_options')->pluck('option_value', 'option_name');

   	 	foreach ($settings as $key => $value) {

   	 		$unpack_value = unserialize($value['option_value']);

   	 		$new_secent_value_array = array();

   	 		foreach ($unpack_value as $key2 => $value2) {

   	 			$new_value_array['id'] = $key2;
   	 			$new_value_array['name'] = $value2;

   	 			$new_secent_value_array[] = $new_value_array;

   	 		}

   	 		$new_final_value_array[$key] = $new_secent_value_array;

   	 	}


   	 	if( !empty($new_final_value_array) && $new_final_value_array != null ){

   	 		return response()->json(['success' => $new_final_value_array], $this->successStatus);
   	 	}
   	 	else{
   	 		return response()->json(['error'=>'Not Found'], 404);
   	 	}


   	 }

   	 // Get option value by Option name
   	 private function getAsfSettings($option_name){

   	 	if( isset($option_name) && !empty($option_name) ){

   	 		$option_value = AsfOption::where('option_name', 'like', $option_name)->first(['option_value'])->toArray();

   	 		return $option_value;
   	 	}
   	 	else{
   	 		return false;
   	 	}

   	 }



   	// Create comment / Message
   	public function messageCreate(Request $request){

        $user = Auth::user();
        $data = array();

        $all_request = (object)$request->json()->all();

        $validator = Validator::make($request->json()->all(), [
            'case_id' 			=> 'required|integer',
            'comment_content' 	=> 'required|max:800',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $data['case_id'] = $all_request->case_id;
        $data['user_id'] = $user->id;
        $data['comment_content'] = $all_request->comment_content;

        $caseComment = new CaseComment;

        $caseComment->case_id = $all_request->case_id;
        $caseComment->user_id = $user->id;
        //$caseComment->comment_content = htmlspecialchars($all_request->comment_content, ENT_QUOTES);
        $caseComment->comment_content = filter_var($all_request->comment_content, FILTER_SANITIZE_STRING);


        $caseComment->save();

        $all_case_comment = CaseComment::where('case_id', $all_request->case_id)->count();

        $success['message'] = 'Message Created Successfully'; 
        $success['total_comments'] = isset($all_case_comment) ? $all_case_comment : 0; 

        return response()->json(['success' => $success], $this->successStatus);

   	}



	// Create comment / Message
	public function messageAll($case_id){

		if ( empty($case_id) || $case_id == null ) {
		 	return response()->json(['error'=>'Case Id not found'], 404);            
		}

		$user = Auth::user();


		$case_comments = CaseComment::where('case_id', $case_id)->with('user')->latest()->paginate(10);

		
		$new_case_comments = array();
		$new_case_comments_last = array();

		if( !empty($case_comments) && $case_comments != null ){

			$case_comments = $case_comments->toArray();

			foreach ($case_comments['data'] as $key => $value) {
				
				//dump($value['user']['id']);

				$new_case_comments['id'] = $value['id'];
				$new_case_comments['case_id'] = $value['case_id'];
				$new_case_comments['user_id'] = $value['user_id'];
				$new_case_comments['comment_content'] = $value['comment_content'];
				$new_case_comments['comment_date'] = $value['created_at'];
				$new_case_comments['user_name'] = $value['user']['name'];

				$user_profiles = UserMeta::where('user_id' , $value['user']['id'])->get(['meta_key', 'meta_value'])->toArray();


				$new_array_profiles = array();
				
				foreach ($user_profiles as $value_2) {
					$new_array_profiles[$value_2['meta_key']] = $value_2['meta_value'];
				};


				if ( !empty($new_array_profiles) && $new_array_profiles != null  ) {
					$new_case_comments['user_designation'] = $new_array_profiles['designation'];

					$profile_pic_with_url = unserialize($new_array_profiles['profile_pic']);

					$new_case_comments['user_profile_pic'] = $this->uploadUrl . $profile_pic_with_url['url_thumb'];

				}
				else{
					$new_case_comments['user_designation'] = null;
					$new_case_comments['user_profile_pic'] = null;
				}


				$new_case_comments_last[] = $new_case_comments;
				

				
			} // foreach

			//print_r($new_case_comments_last);
		}
		else{
			return response()->json(['error'=>'No Comments Found'], 404); 
		}

		


		// $case_comments = DB::table('case_comments')
		// 		            ->leftJoin('users', 'case_comments.user_id', '=', 'users.id')
		// 		            ->leftJoin('user_metas', 'case_comments.user_id', '=', 'user_metas.user_id')
		// 		            ->select('case_comments.*', 'users.name', 'user_metas.meta_key', 'user_metas.meta_value')
		// 		            ->where('case_comments.case_id', '=', $case_id)
		// 		            //->where('user_metas.meta_key', 'like', 'profile_pic')
		// 		            ->paginate(10)->toArray();

		

		$final_cases_last = array_merge( $case_comments, array('data' => $new_case_comments_last ));

		return response()->json(['success' => $final_cases_last], $this->successStatus);

	}


	// Get total comment by case id
	private function totalCommentsByCaseId($case_id){

		if( isset($case_id) && !empty($case_id) ){

			$caseComment = CaseComment::where('case_id', $case_id)->count();

			return $caseComment;

		}
		else{
			return 0;
		}

	}



	// Forgot Password
	public function passwordForgot(Request $request){

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

				
				return response()->json(['success' => 'OTP number sent to your mobile'], $this->successStatus);

			}
			else{
				return response()->json(['error'=> 'Phone number is not Authenticated' ], 403);  
			}
		}
		else{
			
			return response()->json(['error'=>$validator->errors()], 403);  
		}


	} // passwordForgot


	// Verify OTP number
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

				//return view('auth.passwords.resetform')->with(['token' => $request->_token, 'phone' => $request->phone]);

				$user = User::where('phone', $request->phone)->first();

				$success['message'] = 'OTP validation successfull';
				$success['key_token'] = $user->getRememberToken();

				return response()->json(['success' => $success ], $this->successStatus);

			}
			else{
				
				return response()->json(['error'=> 'OTP does not match or Expired' ], 403); 
			}
			
		}
		else{
			
			return response()->json(['error'=>$validator->errors()], 403); 
		}


	} //verifyOTPPhone


	// Reset password form
	public function resetPasswordPhone(Request $request){


    	$validator = Validator::make($request->all(), 
    		[
    			'key_token' 	=> 'required',
            	'phone'         => 'required|regex:/(01)[0-9]{9}/|size:11',
            	'password' 		=> 'required|confirmed',
        	]);


    	if(!$validator->fails()){

    		$user = User::where('phone', $request->phone)->first();

    		if( $user->getRememberToken() === $request->key_token ){

    			$user->password = bcrypt($request->password);

    			//Changing the type
    			$user->save();

    			
    			return response()->json(['success' => 'Password change successfull'], $this->successStatus);
    		}
    		else{
    			return response()->json(['error'=> 'Token does not match' ], 403);
    		}

    	}
    	else{
    		return response()->json(['error'=>$validator->errors()], 403); 
    	}

	} //resetPasswordPhone



	// FCM Token update for notifications
	public function fcmTokenUpdate(Request $request){

		$user = Auth::user();

		$validator = Validator::make($request->json()->all(), 
		[
			// 'user_id' 		=> 'required|integer',
        	'fcm_token'     => 'required',
        	'device' 		=> 'required',
    	]);

    	if ($validator->fails()) {
    	    return response()->json(['error'=>$validator->errors()], 401);            
    	}

    	$data = json_decode(json_encode($request->json()->all()), FALSE);

    	$user = User::findOrFail($user->id);

    	$user->fcm_token = $data->fcm_token;
    	$user->device = $data->device;
    	$user->save();

    	return response()->json(['success' => 'FCM Token Updated Successfully'], $this->successStatus);

	}


}// Class end