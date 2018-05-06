<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\CaseIncedent;
use App\CaseMeta;
use App\CaseVictim;
use App\AsfOption;
use App\CaseComment;
use App\User;
use App\UserMeta;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;
//use Illuminate\Http\UploadedFile;
//use Illuminate\Support\Facades\Storage;
use File;
use Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;

use App\Notifications\Controllers\FcmNotificationsController;

use App\Http\Controllers\Backend\UploadController as UploadFile;


class CaseIncedentController extends BackendController
{

	protected $limit = 10;
	protected $case_status = 'new';
	protected $uploadPath;
	protected $uploadUrl;


	public function __construct()
	{
	    parent::__construct();
	    $this->uploadPath = public_path(config('cms.uploads.directory'));
	    $this->uploadUrl = url('/uploads');
	}


	private function uploadFile(){

		return $uploadFile = new uploadFile;
	}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    	$cases = CaseIncedent::orderBy('id', 'DESC')->with('user')->latest()->paginate($this->limit);
		$user = Auth::guard('web')->user();
		
    	//dd($cases);

        return view('backend.case.index',compact('cases','user'))->with('i', (request()->input('page', 1) - 1) * 5);
        //return view('backend.case.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CaseIncedent $cases)
    {
    	//$cases = new CaseIncedent();

        return view('backend.case.create', compact('cases'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CaseRequest $request)
    {


    	$data = $this->handleRequest($request);

    	$data['case_status'] = $this->case_status;


    	$data = $request->user()->cases()->create($data);

    	//$data_victim = $this->handleVictimRequest($request, $data->id);


    	if( isset($data_victim) && !empty($data_victim) ){
    		CaseVictim::insert($data_victim);
    	}

    	$other_fields = $this->saveOtherField($request, $data->id);

    	//$case_meta = new CaseMeta;

    	if( isset($other_fields) && !empty($other_fields) ){
    		CaseMeta::insert($other_fields);
    	}

    	

    	return redirect()->route('backend.case.index')->with('message', 'Your Case was created successfully!');

    }


    private function handleRequest($request)
    {

    	$data['case_title'] = $request->input('case_title');
    	$data['case_details'] = $request->input('case_details');
    	$data['case_type'] = $request->input('case_type');
		$data['incident_date'] = date('Y-m-d H:i:s', strtotime($request->input('incident_date')));
		$data['action_taken'] = $request->input('action_taken');

        return $data;
    }
// Save additional field to case meta 
private function saveOtherField($request, $id){

	$data_other_field = $request->input('casefieldextra');

	
	// For image file check
	$new_image_array = array();

	if ($request->hasFile('casefieldextra'))
	{

		$all_image = $request->file('casefieldextra');



		$destination = $this->uploadPath;

		

		foreach ($all_image as $key => $value) {


			$fileValidate = Validator::make($request->file(), 
				[
				   //$key => 'mimes:jpg,jpeg,bmp,png|max:10240',
				   $key => 'max:10240',
				   ]
			);

			$file_valid_extensions = $this->checkFileMimeType($value);


			if( !$fileValidate->fails() && $file_valid_extensions){

				$file = $value->getClientOriginalName();

				$extension = $value->getClientOriginalExtension();

				$file_name_modified = str_replace(' ', '-', strtolower($file));;

				$file_name_modified = preg_replace('/[^A-Za-z0-9\. -]/', '', $file_name_modified);

				$fileName = time().'_'.$file_name_modified;

				$file_path = "/" . date("Y") . '/' . date("m") . "/";

				
				$fileDatePath = $destination . $file_path;


				if (! File::exists($fileDatePath)) {
					File::makeDirectory($fileDatePath, 0777,true);
				}

				$successUploaded = $value->move($fileDatePath, $fileName);

				if($successUploaded){

					

					$width     = config('cms.image.thumbnail.width');
					$height    = config('cms.image.thumbnail.height');
					//$extension = $image->getClientOriginalExtension();
					$thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName);

					Image::make($fileDatePath . $fileName)
						->resize($width, $height)
						->save($fileDatePath . '/' . $thumbnail);

					//$new_image_array[$key] = $file_path . $fileName;

					$new_image_array_single['case_id'] = $id;
					$new_image_array_single['user_id'] = $request->user()->id;
					$new_image_array_single['meta_key'] = $key;
					$new_image_array_single['meta_value'] = ( !empty($file_path . $fileName) ? $file_path . $fileName : null );

					array_push($new_image_array, $new_image_array_single );

				}

			}

		} // foreach


	}

	


	if(!empty($id) && !empty($data_other_field) ){

		$new_other_filed2 = array();

		foreach ($data_other_field as $key => $value) {

			if(isset($key) && !empty($key)){
				$new_other_filed['case_id'] = $id;
				$new_other_filed['user_id'] = $request->user()->id;
				$new_other_filed['meta_key'] = $key;
				$new_other_filed['meta_value'] = ( !empty($value) ? $value : null );

				array_push($new_other_filed2, $new_other_filed );
			}

		}

		$last_new_other_fileds = array_merge($new_other_filed2, $new_image_array);

		//dd($last_new_other_fileds);

		return $last_new_other_fileds;
	}
	else{
		return false;
	}
	
}



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$cases = CaseIncedent::with('user', 'casemeta', 'casevictim')->find($id);
		
		$users =  User::all();

		$assigned_engineer_id = $cases->assigned_engineer_id; 
		$assigned_engineer = null; 
		$assigned_engineer = User::find($assigned_engineer_id);


        return View::make('backend.case.show', ['assigned_engineer' => $assigned_engineer, 'users' => $users, 'cases' => $cases]);
        
    }



    // help desk team meta info to show()
    private function hdMetaTeamMetaInfo($case_metas, $caseMeta_info_id, $meta_name){



    	if( empty($case_metas) || empty($caseMeta_info_id) || empty($meta_name) ){
    		return;
    	}

    	$caseMeta_info_ids = array_values(array_unique($caseMeta_info_id));


    	$all_value_by_hd_id = array();
    	$all_value_by_hd_id_last = array();

    	foreach ($caseMeta_info_ids as $caseMeta_info_id) {

    		
    		$case_info_hd_first = array();
    		$user_id = array();

    		foreach ($case_metas as $key => $value){

    			// HD team meta
    			if( $meta_name == 'case_info_hd' && strpos($value['meta_key'], 'case_info_hd')  !== false ){

    				if( strpos($value['meta_key'], 'case_info_hd|hd_content_text-'.$caseMeta_info_id)  !== false ){
    					$case_info_hd_first['text'][$value['meta_key']] = $value['meta_value'];

    					$user_id = $value['user_id'];
    					$all_value_by_hd_id['created_at'] = date('d-m-Y', strtotime($value['created_at']));
    				}
    				elseif( strpos($value['meta_key'], 'case_info_hd|hd_content_files-'.$caseMeta_info_id)  !== false ){

    					$files_url = unserialize($value['meta_value']);

    					

    					if ( file_exists($this->uploadPath . $files_url['url']) ) {
    						if( $this->uploadFile()->checkFileMimeTypeImage( $this->uploadPath . $files_url['url'] ) ){
    							$case_info_hd_first['images'][$value['meta_key']] = $this->uploadUrl . $files_url['url'];
    						}
    						else{
    							$case_info_hd_first['files'][$value['meta_key']] = $files_url['url_full'];
    						}
    					}
    					

    					$user_id = $value['user_id'];
    					$all_value_by_hd_id['created_at'] = date('d-m-Y', strtotime($value['created_at']));
    				}

    				$all_value_by_hd_id['data'] = $case_info_hd_first;

    			}
    			// FF team meta
    			if( $meta_name == 'case_info_ff' && strpos($value['meta_key'], 'case_info_ff')  !== false ){

    				if( strpos($value['meta_key'], 'case_info_ff|ff_content_text-'.$caseMeta_info_id)  !== false ){
    					$case_info_hd_first['text'][$value['meta_key']] = $value['meta_value'];

    					$user_id = $value['user_id'];
    					$all_value_by_hd_id['created_at'] = date('d-m-Y', strtotime($value['created_at']));
    				}
    				elseif( strpos($value['meta_key'], 'case_info_ff|ff_content_files-'.$caseMeta_info_id)  !== false ){

    					$files_url = unserialize($value['meta_value']);

    					if ( file_exists($this->uploadPath . $files_url['url']) ){
    						if ( $this->uploadFile()->checkFileMimeTypeImage( $this->uploadPath . $files_url['url'] ) ) {
    							$case_info_hd_first['images'][$value['meta_key']] = $this->uploadUrl . $files_url['url'];
    						}
    						else{
    							$case_info_hd_first['files'][$value['meta_key']] = $files_url['url_full'];
    						}
    					}

    					

    					$user_id = $value['user_id'];
    					$all_value_by_hd_id['created_at'] = date('d-m-Y', strtotime($value['created_at']));
    				}

    				$all_value_by_hd_id['data'] = $case_info_hd_first;

    			}


    			// FF team meta
    			if( $meta_name == 'case_info_admin' && strpos($value['meta_key'], 'case_info_admin')  !== false ){

    				if( strpos($value['meta_key'], 'case_info_admin|admin_content_text-'.$caseMeta_info_id)  !== false ){
    					$case_info_hd_first['text'][$value['meta_key']] = $value['meta_value'];

    					$user_id = $value['user_id'];
    					$all_value_by_hd_id['created_at'] = date('d-m-Y', strtotime($value['created_at']));
    				}
    				elseif( strpos($value['meta_key'], 'case_info_admin|admin_content_files-'.$caseMeta_info_id)  !== false ){

    					$files_url = unserialize($value['meta_value']);

    					if ( file_exists($this->uploadPath . $files_url['url']) ){
    						if ( $this->uploadFile()->checkFileMimeTypeImage( $this->uploadPath . $files_url['url'] ) ) {
    							$case_info_hd_first['images'][$value['meta_key']] = $this->uploadUrl . $files_url['url'];
    						}
    						else{
    							$case_info_hd_first['files'][$value['meta_key']] = $files_url['url_full'];
    						}
    					}

    					

    					$user_id = $value['user_id'];
    					$all_value_by_hd_id['created_at'] = date('d-m-Y', strtotime($value['created_at']));
    				}

    				$all_value_by_hd_id['data'] = $case_info_hd_first;

    			}



    		} //end foreach


    		if( isset($user_id) && !empty($user_id) ){

    			$all_value_by_hd_id['user_id'] = $user_id;
    			$user_name = User::where('id', $user_id)->first(['name']);

    			if ( isset($user_name) && $user_name != null  ) {
    				$all_value_by_hd_id['user_name'] = $user_name->name;
    			}
    			
    		}

    		
    		$all_value_by_hd_id_last[] = $all_value_by_hd_id;

    	} // end foreach




    	return $all_value_by_hd_id_last;


    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$cases = CaseIncedent::findOrFail($id);
        $cases = CaseIncedent::with('user', 'casemeta')->findOrFail($id);



        $cases_meta = array();

        if(isset($cases->casemeta) && !empty($cases->casemeta)){
        	foreach ($cases->casemeta as $key => $value) {

        		
        		$cases_meta[$value['meta_key']] = $value['meta_value'];
        		//array_push($cases_meta, $value['meta_key']);
        		
        	}

        }



        //CaseMeta::where('case_id', '=', $id)->where('meta_key', 'like', $value['meta_key'])

        //return view("backend.case.edit", compact('cases'));
        return View::make('backend.case.edit', ['cases' => $cases, 'cases_meta' => $cases_meta]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CaseRequest $request, $id)
    {
        $case     = CaseIncedent::findOrFail($id);
        //$oldImage = $case->image;
        $data     = $this->handleRequest($request);
        $case->update($data);

        // if ($oldImage !== $post->image) {
        //     $this->removeImage($oldImage);
        // }

        $other_fields = $this->saveOtherField($request, $id);

        //$case_meta = new CaseMeta;

        //dd($other_fields);

        if( isset($other_fields) && !empty($other_fields) ){

        	//$case_meta_data = CaseMeta::findOrFail($other_fields);

        	//$case_meta_data->update($other_fields);

        	foreach ($other_fields as $key => $value) {


        		//$affectedRows = CaseMeta::where('case_id', '=', $id)->where('meta_key', 'like', $value['meta_key'])->update(array('meta_value' => $value['meta_value']));


        		CaseMeta::updateOrCreate(
        			// Find match
        			array('case_id' => $id, 'meta_key' => $value['meta_key']), 
        			// Change value
        			array('case_id' => $id, 'user_id' => $request->user()->id, 'meta_key' => $value['meta_key'], 'meta_value' => $value['meta_value'])
        		);

        	}
        }


        //return redirect('/backend/blog')->with('message', 'Your post was updated successfully!');
        return redirect()->route('backend.case.index')->with('message', 'Your Case was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CaseIncedent::findOrFail($id)->delete();

        //return redirect('/backend/blog')->with('trash-message', ['Your post moved to Trash', $id]);
        return redirect()->route('backend.case.index')->with('message', 'Your Case was Deleted!');
    }





    // Case incident info update by HD
    public function CaseInfoUpdateHd(Request $request, $id){

    	$case_id = $id;

    	$user = Auth::guard('web')->user();

    	$all_requent = $request->all('case_info_hd');



    	$all_hd_case_info = array();
    	

    	foreach ($all_requent['case_info_hd'] as $key => $value) {


    		foreach ($value as $key2 => $value2) {

    			if( is_object($value2) ){
    				$fianl_value2 = $this->uploadFile()->single_upload_file($value2);

    				$all_hd_case_info['case_info_hd|'. $key .'|'. $key2 ] = $fianl_value2;
    			}
    			else{
    				$all_hd_case_info['case_info_hd|'.$key .'|'. $key2 ] = filter_var($value2, FILTER_SANITIZE_STRING);
    			}

    		}

    	}


    	$all_hd_case_info_final = array();
    	$all_hd_case_info_last = array();
    	foreach ($all_hd_case_info as $key => $value) {

    		if( !empty($value) && $value != null ){
    			$all_hd_case_info_final['case_id'] = $case_id;
    			$all_hd_case_info_final['user_id'] = $user->id;
    			$all_hd_case_info_final['meta_key'] = $key;
    			$all_hd_case_info_final['meta_value'] = $value;
    			//$all_hd_case_info_final['meta_value'] = $value;
    			$all_hd_case_info_final['created_at'] = date('Y-m-d h:i:s');

    			$all_hd_case_info_last[] = $all_hd_case_info_final;
    		}

    	}

    	if( isset($all_hd_case_info_last) && !empty($all_hd_case_info_last) ){
    		CaseMeta::insert($all_hd_case_info_last);
    	}
    	
    	return redirect('backend/case/'.$case_id)->with('message', 'Your Case updated');

    }


    // Case incident info update by FF Team
    public function CaseInfoUpdateFF(Request $request, $id){

    	$case_id = $id;

    	$user = Auth::guard('web')->user();

    	$all_requent = $request->all('case_info_ff');


    	$all_hd_case_info = array();
    	

    	foreach ($all_requent['case_info_ff'] as $key => $value) {


    		foreach ($value as $key2 => $value2) {

    			if( is_object($value2) ){
    				$fianl_value2 = $this->uploadFile()->single_upload_file($value2);

    				$all_hd_case_info['case_info_ff|'. $key .'|'. $key2 ] = $fianl_value2;
    			}
    			else{
    				$all_hd_case_info['case_info_ff|'.$key .'|'. $key2 ] = filter_var($value2, FILTER_SANITIZE_STRING);
    			}

    		}

    	}


    	$all_hd_case_info_final = array();
    	$all_hd_case_info_last = array();
    	foreach ($all_hd_case_info as $key => $value) {

    		if( !empty($value) && $value != null ){
    			$all_hd_case_info_final['case_id'] = $case_id;
    			$all_hd_case_info_final['user_id'] = $user->id;
    			$all_hd_case_info_final['meta_key'] = $key;
    			$all_hd_case_info_final['meta_value'] = $value;
    			//$all_hd_case_info_final['meta_value'] = $value;
    			$all_hd_case_info_final['created_at'] = date('Y-m-d h:i:s');

    			$all_hd_case_info_last[] = $all_hd_case_info_final;
    		}

    	}

    	if( isset($all_hd_case_info_last) && !empty($all_hd_case_info_last) ){
    		CaseMeta::insert($all_hd_case_info_last);
    	}
    	
    	return redirect('backend/case/'.$case_id)->with('message', 'Your Case has been updated');

    }


    // Case incident info update by Admin
    public function CaseInfoUpdateAdmin(Request $request, $id){

    	$case_id = $id;

    	$user = Auth::guard('web')->user();

    	$all_requent = $request->all('case_info_admin');


    	$all_hd_case_info = array();
    	 


    	$all_hd_case_info_final = array();
    	$all_hd_case_info_last = array();
    	$i = 0;
    	foreach ($all_hd_case_info as $key => $value) {

    		if( !empty($value) && $value != null ){
    			$all_hd_case_info_final['case_id'] = $case_id;
    			$all_hd_case_info_final['user_id'] = $user->id;
    			if( CaseMeta::where('meta_key', 'like', $key )->exists() ){
    				$all_hd_case_info_final['meta_key'] = $key . '|sp-'. strtotime("now");
    			}
    			else{
    				$all_hd_case_info_final['meta_key'] = $key;
    			}
    			$all_hd_case_info_final['meta_value'] = $value;
    			//$all_hd_case_info_final['meta_value'] = $value;
    			$all_hd_case_info_final['created_at'] = date('Y-m-d h:i:s');

    			$all_hd_case_info_last[] = $all_hd_case_info_final;
    		}
    		$i++;
    	}


    	if( isset($all_hd_case_info_last) && !empty($all_hd_case_info_last) ){

    		CaseMeta::insert($all_hd_case_info_last);
    	}
    	
    	return redirect('backend/case/'.$case_id)->with('message', 'Your Case has been updated');

    }


    // Create case Message
    public function CaseMessageCreate(Request $request, $id){

    	$user = Auth::guard('web')->user();
    	$data = array();
    	
    	$validator = Validator::make($request->all(), [
    	    '_token' => 'required',
    	    'message' => 'required',
    	]);

    	if ($validator->fails()) {
    	    return response()->json(['error'=>$validator->errors()], 401);            
    	}

    	;

    	$data['case_id'] = $id;
    	$data['user_id'] = $user->id;
    	$data['comment_content'] = filter_var($request->message, FILTER_SANITIZE_STRING);

    	//$data = CaseComment::create($data);
    	$data = Auth::guard('web')->user()->casecomment()->create($data);

    	//print_r($data);

    	$user_name = User::findOrFail($data->user_id);

    	$user_profile = UserMeta::where('user_id', $data->user_id)->where('meta_key', 'like', 'profile_pic')->first(['meta_value']);

    	$user_profile_pic = unserialize($user_profile->meta_value);
    	

    	if( isset($user_profile_pic['url_thumb'])  && !empty($user_profile_pic['url_thumb']) ){
    		$profile_url = $this->uploadUrl . $user_profile_pic['url_thumb'];
    	}
    	else{
    		$profile_url = '/images/avater.png';
    	}

    	$success['user_name'] = $user_name->name;
    	$success['profile_pic'] = $profile_url;
    	$success['comment'] = $data->comment_content;
    	$success['created_at'] = date('d-m-Y h:i A', strtotime($data->created_at));

    	return response()->json($success, 200);


    }



    // Case incident change status
    public function CaseChangeStatus(Request $request, $case_id){

    	if ( empty($case_id) ) {
    		return;
		}
		
		
	

    	$cases = CaseIncedent::findOrFail($case_id);

		$user_id = $cases->user_id;
		
		$user = Auth::guard('web')->user();

    	switch ( $request->input('case_status_action') ) {
    		case 'failed':

				$user->free = 1;
			    $user->eta = date('2000-01-01');
				$user->ert = 0;
				
				$user->save();
				
				$cases->case_status = 'failed';

    			$cases->save();

    			FcmNotificationsController::fcmSingleNotification($user_id, 'Case Cancelled/Failed', $cases->case_title);

    			break;

			case 'in-progress':

				 
				$eta = date('Y-m-d H:i:s', strtotime($request->input('eta')));
				// $ert = $request->input('ert');
				
				$user->eta = $eta;
				$user->ert = $request->input('ert');
				$user->free = 0; 

				$user->save();
				
    			$cases->case_status = 'in-progress';

    			$cases->save();

    			FcmNotificationsController::fcmSingleNotification($user_id, 'Case In-progress', $cases->case_title);

				break;
			
			case 'completed':		

				$user->free = 1;
			    $user->eta = date('2000-01-01');
				$user->ert = 0;
				
				$user->save();
				
			    $cases->case_status = 'completed';

    			$cases->save();

    			FcmNotificationsController::fcmSingleNotification($user_id, 'Case Completed', $cases->case_title);


    		default:
    			
    			break;
    	}

    	return redirect('backend/case/'.$case_id)->with('success-message', 'Case status has been updated');
    	
    }


    // Case incident change status by manager 
    public function CaseChangeStatusManager(Request $request, $case_id){

    	if ( empty($case_id) ) {
    		return;
    	}

		$cases = CaseIncedent::findOrFail($case_id);
		
    	$user_id = $cases->user_id;

    	switch ( $request->input('case_status_action') ) {
			case 'acknowledged':

    			$cases->case_status = 'acknowledged';

    			$cases->save();

    			FcmNotificationsController::fcmSingleNotification($user_id, 'Case Acknowledged', $cases->case_title);

				break;
				
			case 'assigned':

				$cases->assigned_engineer_id = $request->input('assigned_engineer');

				// $user = User::find($cases->assigned_engineer_id);

				// $user->free = 0;
				
				// $user->save();

    			$cases->case_status = 'assigned';

    			$cases->save();

    			FcmNotificationsController::fcmSingleNotification($user_id, 'Case Approved', $cases->case_title);

				break;

			case 'archieved':

    			$cases->case_status = 'archieved';

				$cases->save();
				
				$engineer = User::find($cases->assigned_engineer_id);

				$engineer->free = 1;
				$engineer->eta = date('2000-01-01');
				$engineer->ert = 0;
				
				$engineer->save();

    			FcmNotificationsController::fcmSingleNotification($user_id, 'Case Archieved', $cases->case_title);

				break;

			case 'unarchieved':

    			$cases->case_status = 'new';

    			$cases->save();

    			FcmNotificationsController::fcmSingleNotification($user_id, 'Case Again Opened', $cases->case_title);

				break;	

    		default:
    			
    			break;
    	}


    	return redirect('backend/case/'.$case_id)->with('success-message', 'Ticket status has been updated');
    	
    }



}
