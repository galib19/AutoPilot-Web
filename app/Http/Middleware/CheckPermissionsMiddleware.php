<?php

namespace App\Http\Middleware;

use Closure;
use App\Exceptions\NotAuthorizedException;

class CheckPermissionsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


    	/****
			working comments
    	***/
    	//get current user name
   //  	$currentUser = $request->user();

   //  	// Get current action name
   //  	$currentActionName = $request->route()->getActionName();

   //  	$previousUrl = url()->previous();

   //  	$baseUrl = url('/');

   //  	$prevRouteName = str_replace($baseUrl, "", $previousUrl);

   //  	list($controller, $method) = explode('@', $currentActionName);

   //  	$controller = str_replace(["App\\Http\\Controllers\\Backend\\", "Controller"], "", $controller);

   //  	if( $controller == 'CaseIncedent' && $method != 'CaseMessageCreate' ){

   //  		if( !$currentUser->can("{$controller}_{$method}") ){

			// 	$exception = new NotAuthorizedException('This action is unauthorized.', 403);
			// 	throw $exception->redirectTo($prevRouteName, "Access Forbidden!");

   //  		}

   //  	}
   //  	elseif( $controller == 'Users' ){

   //  		if( $method == 'show' || $method == 'edit' || $method == 'update' ){

   //  			$user_id_param = $request->route()->parameters;

   //  			if( !$currentUser->can("{$controller}_{$method}") ){

   //  				if( $currentUser->id == $user_id_param['user'] ){
   //  					return $next($request);
   //  				}
   //  				else{
   //  					$exception = new NotAuthorizedException('This action is unauthorized.', 403);
   //  					throw $exception->redirectTo($prevRouteName, "Access Forbidden!");
   //  				}

   //  			}
   //  			else{
   //  				return $next($request);
   //  			}

    			
   //  		}
   //  		else{
   //  			if( !$currentUser->can("{$controller}_{$method}") ){

			// 		$exception = new NotAuthorizedException('This action is unauthorized.', 403);
			// 		throw $exception->redirectTo($prevRouteName, "Access Forbidden!");

   //  			}
   //  		}

   //  	}
   //  	elseif( $controller == 'Settings' ){

			// if( !$currentUser->can("{$controller}_{$method}") ){

			// 	$exception = new NotAuthorizedException('This action is unauthorized.', 403);
			// 	throw $exception->redirectTo($prevRouteName, "Access Forbidden!");

			// }

   //  	}

    	/****
			working comment end
    	***/



    	$previousUrl = url()->previous();
    	$baseUrl = url('/');
    	$prevRouteName = str_replace($baseUrl, "", $previousUrl);

    	if( !check_user_permissions($request) ){
			$exception = new NotAuthorizedException('This action is unauthorized.', 403);
			throw $exception->redirectTo($prevRouteName, "Access Forbidden!");
    	}

    	return $next($request);
        
    }
}
