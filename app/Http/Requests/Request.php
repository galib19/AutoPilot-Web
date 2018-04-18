<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    //

	/**
	* Get the response for a forbidden operation.
	*
	* @return \Illuminate\Http\Response
	*/
	public function forbiddenResponse()
	{
		return $this->redirector->route('home');
	}
}
