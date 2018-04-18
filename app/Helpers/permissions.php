<?php

function check_user_permissions($request, $actionName = NULL, $user_id = NULL){

	//get current user name
	$currentUser = $request->user();

	// Get current action name
	if($actionName){
		$currentActionName = $actionName;
	}
	else{
		$currentActionName = $request->route()->getActionName();
	}


	$previousUrl = url()->previous();

	$baseUrl = url('/');

	$prevRouteName = str_replace($baseUrl, "", $previousUrl);

	list($controller, $method) = explode('@', $currentActionName);

	$controller = str_replace(["App\\Http\\Controllers\\Backend\\", "Controller"], "", $controller);



	if( $controller == 'CaseIncedent' && $method != 'CaseMessageCreate' ){

		if( !$currentUser->can("{$controller}_{$method}") ){

			return false;

		}

	}
	elseif( $controller == 'Users' ){

		if( $method == 'show' || $method == 'edit' || $method == 'update' ){

			$user_id_param = $request->route()->parameters;

			$user_id = $user_id_param['user'];

			if( !$currentUser->can("{$controller}_{$method}") ){

				if( $currentUser->id == $user_id ){
					return true;
				}
				else{
					return false;
				}

			}
			else{
				return true;
			}

			
		}
		else{
			if( !$currentUser->can("{$controller}_{$method}") ){

				return false;

			}
		}

	}
	elseif( $controller == 'Settings' ){

		if( !$currentUser->can("{$controller}_{$method}") ){

			return false;

		}

	}


	return true;

}