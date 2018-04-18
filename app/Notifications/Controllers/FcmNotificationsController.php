<?php

namespace App\Notifications\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Backend\BackendController;

use Edujugon\PushNotification\PushNotification;

use App\User;

class FcmNotificationsController extends BackendController
{
    // Set Data
    public static function fcmSingleNotification($user_id, $title, $body){

    	if( empty($user_id) || $user_id == null ){
    		return;
    	}


    	$user = User::find($user_id);

    	if( empty($user) || $user == null ){
    		return;
    	}

    	$user_fcm_token = $user->fcm_token;

    	if( empty($user_fcm_token) || $user_fcm_token == null ){
    		return 'Token not found';
    	}


    	// Push notifications
    	$push = new PushNotification('fcm');

    	// $push->setUrl('https://fcm.googleapis.com/fcm/send');

    	//$push->setApiKey('AAAAEu-j-tM:APA91bGysVtl5leT6CZ8aqTROw-r1OoqxtbADnIgzQL12W_IZI8zQKztdOw-wlo3j1PWDjE2ZPMQl_093d2RSgXMZtjgBOOOMmjQlx0bMxeJSQcwu3KGNFyG0pO__TmtUYHei_s46Lst');

    	$push->setDevicesToken($user_fcm_token);

    	// $push->setConfig([
    	//     'priority' => 'high',
    	//     'dry_run' => true,
    	//     'time_to_live' => 3
    	// ]);

    	if( empty($title) || empty($body) ){
    		return 'Title or Body not found';
    	}

    	$push->setMessage([
           'custom_notification' => [
               'title'				=>$title,
               'body'				=>$body,
               "show_in_foreground"	=> true,
                "sound"				=> "default",
                "priority"			=> "high"
               ]
           ])->send();



    	return true;

    }
}
