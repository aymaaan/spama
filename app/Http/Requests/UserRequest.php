<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
    public function rules(Request $request)
    {


        return [

            'name' => 'required|min:3',
            //'role_id' => 'required',
			//'email' => 'required|min:6|unique:users,email,'.$request->segment(3),
			'email' => 'required|min:6',
			//'phone' => 'required|regex:/(05)[0-9]{8}/'
		
			
						


        ];
    }


 

}
