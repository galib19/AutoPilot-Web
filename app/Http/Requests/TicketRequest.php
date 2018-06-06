<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
    	
        $rules = [
            //'ticket_number'        	=> 'required|string',
            'site_id'         	=> 'required|string',
            'ticket_type'             => 'required',
            // 'action_taken'          => 'required',
            'raised_time'         => 'required'
            //'case_status'         	=> 'required:string',
            // 'name'  				=> 'required|string',
            // 'parents'  				=> 'required',
            // 'location'  			=> 'required',
            // 'age'  					=> 'required|integer',
            // 'sex'  				=> ['required', Rule::in(['man', 'woman', 'girl', 'boys', 'others'])],
            //'published_at' => 'date_format:Y-m-d H:i:s',
            //'upload_image_1'        => 'mimes:jpg,jpeg,bmp,png',
            //'upload_image_2'        => 'mimes:jpg,jpeg,bmp,png',
        ];

        // switch($this->method()) {
        //     case 'PUT':
        //     case 'PATCH':
        //         $rules['slug'] = 'required|unique:posts,slug,' . $this->route('blog');
        //         break;
        // }

        return $rules;
    }
}