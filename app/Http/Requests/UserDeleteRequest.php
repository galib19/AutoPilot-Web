<?php

namespace App\Http\Requests;

//use Illuminate\Foundation\Http\FormRequest;

use App\Http\Requests\Request;
use Response;
use Illuminate\Auth\Access\AuthorizationException;
use App\Exceptions\NotAuthorizedException;

class UserDeleteRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !($this->route('user') == 1 || $this->route('user') == auth()->user()->id);
    }

    public function failedAuthorization()
    {
        $exception = new NotAuthorizedException('This action is unauthorized.', 403);
                
        throw $exception->redirectTo("backend/user", "You cannot Deactive Super Admin user or Deactive yourself!");
        //->with('error-message', 'You cannot delete default user or delete yourself!');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
