<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use App\Rules\Captcha;
use Illuminate\Foundation\Http\FormRequest;
use Session;

class CheckOrderRequest extends FormRequest
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

            'CheckNumber' => 'required',
            'g-recaptcha-response' => new Captcha(),

        ];
    }


 public function attributes()
    {
        return [

   'CheckNumber' =>  __('frontend.IDNumber') ,



        ];
    }

    public function messages()
    {
        return [

    'required' => '  :attribute  ' . __('frontend.Required_Field'),
    'unique' => ' :attribute  ' . __('frontend.already_exist'),


        ];
    }

}
