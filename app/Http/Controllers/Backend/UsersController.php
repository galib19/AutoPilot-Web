<?php

namespace App\Http\Controllers\Backend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rule;
use Validator;
use File;
use App\UserMeta;
use App\AsfOption;

use App\Http\Controllers\Backend\UploadController as UploadFile;
use Illuminate\Support\Facades\View;

use App\Http\Requests;

class UsersController extends BackendController
{
	protected $limit = 20;

	
	private function uploadFile(){

		return $uploadFile = new uploadFile;
	}

	//private $uploadFile = new UploadFile;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users      = User::orderBy('id', 'DESC')->paginate($this->limit);
        $usersCount = User::count();

        return view("backend.user.index", compact('users', 'usersCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {

    	$user_location = $this->get_option_value('user_location');

        return view('backend.user.create', compact('user', 'user_location'));
    }


    // Get Option table value by key
    private function get_option_value($option_name){

    	if ( isset($option_name) && !empty($option_name) ) {

    		$options_value = AsfOption::where('option_name', 'like', $option_name)->first(['option_value']);

    		$option_data = unserialize($options_value->option_value);

    		return $option_data;

    	}
    	else{
    		return false;
    	}

    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

    	$user = Auth::guard('web')->user();

    	//dd($request->all());

    	
    	$validator = Validator::make($request->all(), [
    	    'name'        			=> 'required|string',
    	    'designation'        	=> 'string',
    	    //'user_location'        	=> 'string',
    	    'phone'         		=> 'required|unique:users|regex:/(01)[0-9]{9}/|size:11',
    	    'password'         		=> 'required',
    	    'confirm_password'      => 'required|same:password',
    	    'email'  				=> 'email',
    	    'active'  				=> ['required', Rule::in(['1', '0'])],
    	    'role'        			=> ['required', Rule::in(['manager', 'engineer', 'client'])],
    	    //'profile_pic'  			=> 'mimes:jpg,jpeg,bmp,png|max:10240',
    	]);


    	if( $validator->fails() ){
    		return;
    	}

    	$data = $this->handleRequest($request);
        $data['eta'] = date('2000-01-01');
        $data['ert'] = 0;
    	$data = User::create($data);
        
    	$data->remember_token = str_random(60);
    	$data->save();

    	$data->detachRoles(['manager', 'engineer', 'client']);
        $data->attachRole($request->input('role'));

    	$data_user_meta = $this->handleUserMetaRequest($request, $data->id);


    	if( isset($data_user_meta) && !empty($data_user_meta) ){
    		UserMeta::insert($data_user_meta);
    	}

    	return redirect()->route('backend.user.index')->with('message', 'User was created successfully!');

    }

    // User create handle request
    private function handleRequest($request)
    {

    	$data['name'] = $request->input('name');
    	$data['phone'] = $request->input('phone');
    	$data['email'] = $request->input('email');
    	$data['password'] = Hash::make($request->input('password'));
        $data['active'] = $request->input('active');
        
					
    	//$data['remember_token'] = str_random(60);

        return $data;
    }

    // Get User Meta info
    private function handleUserMetaRequest($request, $user_id){

    	if(isset($user_id) && !empty($user_id)){

	    	$data_user_meta = array();
	    	$data_user_meta_final = array();

	    	$data_other_field = $request->all(['designation', 'profile_pic', 'user_location']);

	    	foreach ($data_other_field as $key => $value) {

	    		if( is_object($value) ){
	    			$fianl_meta_value = $this->uploadFile()->single_upload_file($value, true, 'profile_thumb');
	    		}
	    		else{
	    			$fianl_meta_value = $value;
	    		}

	    		$data_user_meta['user_id'] = $user_id;
	    		$data_user_meta['meta_key'] = $key;
	    		$data_user_meta['meta_value'] = ( !empty($fianl_meta_value) ? $fianl_meta_value : null );

	    		$data_user_meta_final[] = $data_user_meta;

	    	}
	    	
	    	return $data_user_meta_final;

    	}

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('usermeta', 'roles')->find($id);

        $all_user_metas = UserMeta::where('user_id', $user->id)->get();


        $user_meta = array();

        if(isset($all_user_metas) && !empty($all_user_metas)){
        	foreach ($all_user_metas as $key => $value) {

        		if( $this->uploadFile()->is_serialized($value['meta_value']) ){
        			$user_meta[$value['meta_key']] = unserialize($value['meta_value']);
        		}
        		else{
        			$user_meta[$value['meta_key']] = $value['meta_value'];
        		}

        		
        		//array_push($user_meta, $value['meta_key']);
        		
        	}

        }

        $all_location = $this->get_option_value('user_location');


        return View::make('backend.user.show', ['user' => $user, 'usermeta' => $user_meta, 'all_location' => $all_location]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Requests\UserUpdateRequest $request, $id)
    {
        //
    	$user = User::with('usermeta', 'roles')->findOrFail($id);

    	// $user_metas = UserMeta::where('user_id', $user->id)->get(['meta_key', 'meta_value'])->toArray();

    	$user_metas = $user->usermeta;

    	$user_meta_data = array();

    	foreach ($user_metas as $user_meta) {

    		if( $user_meta['meta_key'] == 'profile_pic' ){

    			$profile_pic_thumb_url = unserialize($user_meta['meta_value']);


    			$user_meta_data[$user_meta['meta_key']] = ( !empty($profile_pic_thumb_url) ? $profile_pic_thumb_url['url_thumb'] : null );
    		}
    		else{
    			$user_meta_data[$user_meta['meta_key']] = ( !empty($user_meta['meta_value']) ? $user_meta['meta_value'] : null );
    		}

    	}


    	$user = (object)array_merge( $user->toArray(), $user_meta_data );

    	$user_location = $this->get_option_value('user_location');

        return view('backend.user.edit', compact('user', 'user_location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UserUpdateRequest $request, $id)
    {
        

        $user = Auth::guard('web')->user();

        $validator = Validator::make($request->all(), [
            'name'        			=> 'required|string',
            'designation'        	=> 'string',
            'user_location'        	=> 'string',
            'role'        			=> ['string', Rule::in(['manager', 'engineer', 'client'])],
            // 'phone'         		=> 'required|unique:users|regex:/(01)[0-9]{9}/|size:11',
            //'password'         		=> 'required',
            //'confirm_password'      => 'same:password',
            'email'  				=> 'email',
            'active'  				=> ['required', Rule::in(['1', '0'])],
            'profile_pic'  			=> 'mimes:jpg,jpeg,bmp,png|max:10240',
        ]);


        if( $validator->fails() ){
        	return $validator->errors();
        }

        $user_info     = User::findOrFail($id);

        $user_info->name = $request->input('name');
        $user_info->email = $request->input('email');
        $user_info->active = $request->input('active');

        $user_info->save(); // To Bypass fillable


        $user_info->detachRoles(['manager', 'engineer', 'client']);
        $user_info->attachRole($request->input('role'));


        $data_user_meta = $this->handleUserMetaRequest($request, $id);

        if( isset($data_user_meta) && !empty($data_user_meta) ){

        	//$case_meta_data = CaseMeta::findOrFail($other_fields);

        	//$case_meta_data->update($other_fields);

        	foreach ($data_user_meta as $key => $value) {

        		if( $value['meta_value'] != null ){
        			UserMeta::updateOrCreate(
        				// Find match
        				array('user_id' => $id, 'meta_key' => $value['meta_key']), 
        				// Change value
        				array('user_id' => $id, 'meta_key' => $value['meta_key'], 'meta_value' => $value['meta_value'])
        			);
        		}

        	}

        }

        return redirect()->route('backend.user.show', $id)->with('message', 'User updated successfully!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests\UserDeleteRequest $request, $id)
    {
        $user = User::findOrFail($id);

        //$user->delete();

        $user->active = 0;

        $user->save();


        //return redirect('/backend/blog')->with('trash-message', ['Your post moved to Trash', $id]);
        return redirect()->route('backend.user.index')->with('message', 'User was Deactivated!');
    }


}
