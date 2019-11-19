<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use App\Rules\Captcha;
use Illuminate\Foundation\Http\FormRequest;
use Session;

class NewOrderRequest extends FormRequest
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

            'order_id_number' => 'required',
            'order_types_id' => 'required',
            'attachment_file.*' => 'mimes:doc,docx,jpeg,jpg,png,gif,pdf,doc,mp3,wav,mp4|max:6048',
            'g-recaptcha-response' => new Captcha(),

        ];
    }


 public function attributes()
    {
        return [

   'order_id_number' =>  __('frontend.IDNumber') ,
   'order_types_id' => __('frontend.OrderType'),
   'attachment_file' => __('frontend.File'),


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
