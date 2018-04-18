<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\AsfOption;

class SettingsController extends BackendController
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    	

    	//$this->action_taken_by_fa();
    	//$this->user_location();


        return view('backend\settings');
    }


    // Types fo violence Field agent will select to create case
    private function type_of_violence(){

    	$types_of_violence = array();
    	$types_of_violence_list = array();

    	$types_of_violence_list = array(
    		'1' => 'Acid Violence',
    		'2' => 'Burn Violence',
    		'3' => 'Child Marriage',
    	);

    	//dd(serialize($types_of_violence_list));

    	$types_of_violence['option_name'] = 'violence_type';
    	$types_of_violence['option_value'] = serialize($types_of_violence_list);

    	AsfOption::insert($types_of_violence);

    }

    // Action taken by Field agent will select to create case
    private function action_taken_by_fa(){

    	$action_taken_field_agent = array();
    	$action_taken_field_agent_list = array();

    	$action_taken_field_agent_list = array(
    		'1' => 'Refer to hospital',
    		'2' => 'Refer to police',
    		'3' => 'Refer to other',
    	);

    	//dd(serialize($action_taken_field_agent_list));

    	$action_taken_field_agent['option_name'] = 'action_taken';
    	$action_taken_field_agent['option_value'] = serialize($action_taken_field_agent_list);

    	AsfOption::insert($action_taken_field_agent);
    	
    }


    // Field agent user location on create users
    private function user_location(){

    	$user_location = array();
    	$user_location_list = array();

    	$user_location_list = array(
    		'norshindi-01' => 'Norshindi 01',
    		'norshindi-02' => 'Norshindi 02',
    		'norshindi-03' => 'Norshindi 03',
    		'norshindi-04' => 'Norshindi 04',
    	);

    	//dd(serialize($user_location_list));

    	$user_location['option_name'] = 'user_location';
    	$user_location['option_value'] = serialize($user_location_list);

    	AsfOption::updateOrCreate(
    		// Find match
    		array('option_name' => 'user_location'), 
    		// Change value
    		array('option_value' => serialize($user_location_list))
    	);
    	
    }



}
