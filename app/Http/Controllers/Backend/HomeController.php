<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\UserMeta;

class HomeController extends BackendController
{


    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	// $user = Auth::user();

    	// $user_metas = UserMeta::where('user_id', $user->id)->get(['meta_key', 'meta_value'])->toArray();

    	// $user_meta_data = array();

    	// foreach ($user_metas as $user_meta) {

    	// 	if( $user_meta['meta_key'] == 'profile_pic' ){

    	// 		$profile_pic_thumb_url = unserialize($user_meta['meta_value']);


    	// 		$user_meta_data[$user_meta['meta_key']] = ( !empty($profile_pic_thumb_url) ? $profile_pic_thumb_url['url_thumb'] : null );
    	// 	}
    	// 	else{
    	// 		$user_meta_data[$user_meta['meta_key']] = ( !empty($user_meta['meta_value']) ? $user_meta['meta_value'] : null );
    	// 	}

    	// }


    	// $users = array_merge( $user->toArray(), $user_meta_data );

        // return view('backend\dashboard', ['profiles' => (object)$users]);
        return view('backend\dashboard');
    }
}
