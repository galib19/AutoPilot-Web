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

    	//dd($cases);

        return view('backend.case.index',compact('cases'))->with('i', (request()->input('page', 1) - 1) * 5);
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

    	$data_victim = $this->handleVictimRequest($request, $data->id);


    	if( isset($data_victim) && !empty($data_victim) ){
    		CaseVictim::insert($data_victim);
    	}

    	$other_fields = $this->saveOtherField($request, $data->id);

    	//$case_meta = new CaseMeta;

    	if( isset($other_fields) && !empty($other_fields) ){
    		CaseMeta::insert($other_fields);
    	}

    	
    	//dd($other_fields);

    	//$case_meta->name = $request->name;

    	// foreach ($other_fields as $value) {

    	// 	$case_meta->case_id = $value['case_id'];
    	// 	$case_meta->user_id = $value['user_id'];
    	// 	$case_meta->meta_key = $value['meta_key'];
    	// 	$case_meta->meta_value = $value['meta_value'];

    	// }

    	// $case_meta->save();

    	//dd($case_meta);


    	

    	//dd($other_field);

    	// DB::table('case_meta')->insert(array(
    	// 	array('case_id' => '1', 'user_id' => '1', 'meta_key' => 'meta_value'),
    	// 	array('case_id' => '2', 'user_id' => '2', 'meta_key' => 'meta_value'),
    	// ));

    	return redirect()->route('backend.case.index')->with('message', 'Your Case was created successfully!');


        // request()->validate([
        //     'title' => 'required',
        //     'body' => 'required',
        // ]);

        // CaseIncedent::create($request->all());
        // return redirect()->route('backend.case.index')
        //                 ->with('status','Article created successfully');
    }


    private function handleRequest($request)
    {

    	$data['case_title'] = $request->input('case_title');
    	$data['case_details'] = $request->input('case_details');
    	//$data['name'] = $request->input('name');
    	//$data['parents'] = $request->input('parents');
    	//$data['location'] = $request->input('location');
    	//$data['age'] = $request->input('age');
    	//$data['gender'] = $request->input('gender');
    	$data['case_type'] = $request->input('case_type');

    	$data['incident_date'] = date('Y-m-d H:i:s', strtotime($request->input('incident_date')));
    	$data['action_taken'] = '['. join(',', $request->input('action_taken')) .']';

        //$data = $request->all();

        return $data;
    }


    // handle victim request
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


    // Check File Mimie Type for validation
    private function checkFileMimeType( $filename ){

    	$check_valid_mime_type = false;

    	$all_valid_mime_type = [
    		'image/png', 
    		'image/jpeg', 
    		'image/gif', 
    		'image/bmp',
    		'application/pdf',
    		'application/msword',
    		'application/vnd.ms-excel',
    		'application/zip'
    	];

    	$file_mime_type = $filename->getMimeType();

    	$check_valid_mime_type = in_array($file_mime_type,  $all_valid_mime_type);

    	return $check_valid_mime_type;
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

        //$cases_meta = CaseIncedent::with('casemeta')->find($id);

        //dd($cases->casemeta);

        $user_case_meta = CaseMeta::where('user_id', $cases->user->id)->where('case_id', $cases->id)->get();

        //dd($user_case_meta);


        //$new_array = array();
        $cases_meta = array();
        $cases_meta_inside = array();

        $case_info_hd_first = array();

        // meta id hd
        $hd_meta_id = array();
        $ff_meta_id = array();
        $admin_meta_id = array();



        if(isset($cases->casemeta) && !empty($cases->casemeta)){
        	foreach ($cases->casemeta as $key => $value) {

        		// Only multi image files fron mobile
        		if( strpos($value['meta_key'], 'multi_files_images')  !== false ){
        			$cases_meta['fa_multi_images'][$value['meta_key']] = $value['meta_value'];

        		}
        		// Only multi other files/pdf from mobile
        		elseif( strpos($value['meta_key'], 'multi_files_other')  !== false ){
        			$cases_meta['fa_multi_files'][$value['meta_key']] = $value['meta_value'];

        		}
        		// Only single image from mobile
        		elseif( strpos($value['meta_key'], 'single_file_image')  !== false ){
        			$cases_meta['fa_sing_image'][$value['meta_key']] = $value['meta_value'];

        		}
        		// Only single file/pdf from mobile
        		elseif( strpos($value['meta_key'], 'single_file_other')  !== false ){
        			$cases_meta['fa_sing_files'][$value['meta_key']] = $value['meta_value'];

        		}
        		// help desk team content
        		elseif( strpos($value['meta_key'], 'case_info_hd')  !== false ){

        			
        			$get_the_id_array = explode('|', $value['meta_key']);

        			$get_the_id_text = (int)str_replace('hd_content_text-', '', $get_the_id_array[1]);

        			$get_the_id_files = (int)str_replace('hd_content_files-', '', $get_the_id_array[1]);

        			$hd_meta_id[] = $get_the_id_text;

        			$hd_meta_id[] = $get_the_id_files;

        			$total_case_info_hd = max($hd_meta_id);
        			

        			$cases_meta['case_info_hd_count'] = ($total_case_info_hd + 1);


        		}
        		// Admin team case content
        		elseif( strpos($value['meta_key'], 'case_info_admin')  !== false ){

        			$get_the_id_array = explode('|', $value['meta_key']);

        			$get_the_id_text = (int)str_replace('admin_content_text-', '', $get_the_id_array[1]);

        			$get_the_id_files = (int)str_replace('admin_content_files-', '', $get_the_id_array[1]);

        			$admin_meta_id[] = $get_the_id_text;

        			$admin_meta_id[] = $get_the_id_files;

        			$total_case_info_admin = max($admin_meta_id);


        			$cases_meta['case_info_admin_count'] = ($total_case_info_admin + 1);
        		}
        		// FF team case content
        		elseif( strpos($value['meta_key'], 'case_info_ff')  !== false ){

        			$get_the_id_array = explode('|', $value['meta_key']);

        			$get_the_id_text = (int)str_replace('ff_content_text-', '', $get_the_id_array[1]);

        			$get_the_id_files = (int)str_replace('ff_content_files-', '', $get_the_id_array[1]);

        			$ff_meta_id[] = $get_the_id_text;

        			$ff_meta_id[] = $get_the_id_files;

        			$total_case_info_ff = max($ff_meta_id);

        			$cases_meta['case_info_ff_count'] = ($total_case_info_ff + 1);
        		}
        		else{
        			$cases_meta['fa_field_normal'][$value['meta_key']] = $value['meta_value'];

        		}
        		
        	}// end foreach

        	

        	$meta_info_hd = $this->hdMetaTeamMetaInfo($cases->casemeta, $hd_meta_id, $meta_name = 'case_info_hd');
        	$meta_info_ff = $this->hdMetaTeamMetaInfo($cases->casemeta, $ff_meta_id, $meta_name = 'case_info_ff');
        	$meta_info_admin = $this->hdMetaTeamMetaInfo($cases->casemeta, $admin_meta_id, $meta_name = 'case_info_admin');



        	$cases_meta['case_info_hd'] = $meta_info_hd;
        	$cases_meta['case_info_ff'] = $meta_info_ff;
        	$cases_meta['case_info_admin'] = $meta_info_admin;



        }



       // all options
        $all_actions = AsfOption::where('option_name', 'like', 'action_taken')->first(['option_value']);

        $all_violence_type = AsfOption::where('option_name', 'like', 'violence_type')->first(['option_value']);

        $all_actions = unserialize($all_actions['option_value']);

        $all_violence_type = unserialize($all_violence_type['option_value']);

        
        // All comments from this case
        $all_comments = CaseComment::where('case_id', $cases->id)->orderBy('id', 'DESC')->with('user')->oldest()->paginate(10);

        
        if( isset($all_comments) && !empty($all_comments) ){
        	$all_comments_array = $all_comments->toArray();


        	$all_users = array();

        	foreach ($all_comments_array['data'] as $key => $value) {

        		$user_profile = UserMeta::where('user_id', $value['user']['id'])->where('meta_key', 'like', 'profile_pic')->first(['meta_value']);


        		if( !empty($user_profile) ){
        			$profile_pic = unserialize($user_profile->meta_value);
        		}
        		else{
        			$profile_pic = '';
        		}

        		
        		$value['user']['profile_pic'] = !empty($profile_pic['url']) ? $this->uploadUrl . $profile_pic['url_thumb'] : null;

        		$all_users[] = $value;
        	}

        	$reverse_array = array_reverse($all_users);


        	$all_comments_array['data'] = $reverse_array;

        	//$all_comments = array_merge($all_comments->data, $all_users);

        }



        return View::make('backend.case.show', ['cases' => $cases, 'cases_meta' => $cases_meta, 'action_taken' => $all_actions, 'violence_type' => $all_violence_type, 'case_comments' => $all_comments_array]);
        
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


        		// if(!$affectedRows){
        		// 	$affectedRows = CaseMeta::where('case_id', '=', $id)->where('meta_key', 'like', $value['meta_key'])->update(array('meta_value' => $value['meta_value']));
        		// }


        		//dd($affectedRows);
        	}



        	//$affectedRows = CaseMeta::where('case_id', '=', $id)->update($other_fields);

        	//$affectedRows = User::where('votes', '>', 100)->update(array('status' => 2));

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
    	

    	foreach ($all_requent['case_info_admin'] as $key => $value) {


    		foreach ($value as $key2 => $value2) {

    			if( is_object($value2) ){
    				$fianl_value2 = $this->uploadFile()->single_upload_file($value2);

    				$all_hd_case_info['case_info_admin|'. $key .'|'. $key2 ] = $fianl_value2;
    			}
    			else{
    				$all_hd_case_info['case_info_admin|'.$key .'|'. $key2 ] = filter_var($value2, FILTER_SANITIZE_STRING);
    			}

    		}

    	}


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

    	switch ( $request->input('case_status_action') ) {
    		case 'archive':

    			$cases->case_status = 'archive';

    			$cases->save();

    			FcmNotificationsController::fcmSingleNotification($user_id, 'Case Archived', $cases->case_title);

    			break;

    		case 'open':

    			$cases->case_status = 'open';

    			$cases->save();

    			FcmNotificationsController::fcmSingleNotification($user_id, 'Case Opened', $cases->case_title);

    			break;
    		
    		default:
    			
    			break;
    	}

    	return redirect('backend/case/'.$case_id)->with('success-message', 'Case status has been updated');
    	
    }


    // Case incident change status by admin for approve
    public function CaseChangeStatusAdmin(Request $request, $case_id){

    	if ( empty($case_id) ) {
    		return;
    	}

    	$cases = CaseIncedent::findOrFail($case_id);

    	$user_id = $cases->user_id;


    	switch ( $request->input('case_status_action') ) {
    		case 'archive':
    			
    			//$cases = CaseIncedent::findOrFail($case_id);

    			$cases->case_status = 'archive';

    			$cases->save();

    			FcmNotificationsController::fcmSingleNotification($user_id, 'Case Archived', $cases->case_title);

    			break;

    		case 'open':

    			//$cases = CaseIncedent::findOrFail($case_id);

    			$cases->case_status = 'open';

    			$cases->save();

    			FcmNotificationsController::fcmSingleNotification($user_id, 'Case Opened', $cases->case_title);

    			break;


    		case 'approve':

    			//$cases = CaseIncedent::findOrFail($case_id);

    			$cases->case_status = 'approve';

    			$cases->save();

    			FcmNotificationsController::fcmSingleNotification($user_id, 'Case Approved', $cases->case_title);

    			break;
    		
    		default:
    			
    			break;
    	}


    	return redirect('backend/case/'.$case_id)->with('success-message', 'Case status has been updated');
    	
    }



}
