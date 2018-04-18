<?php

namespace App\Http\Requests;

//use Illuminate\Foundation\Http\FormRequest;

use App\Http\Requests\Request;
use App\Exceptions\NotAuthorizedException;

class UserUpdateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !($this->route('user') == 1);
    }

    public function failedAuthorization()
    {
        $exception = new NotAuthorizedException('This action is unauthorized.', 403);
                
        throw $exception->redirectTo("backend/user", "You cannot Edit Super Admin user");
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
