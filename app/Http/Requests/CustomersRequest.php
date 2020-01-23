<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class CustomersRequest extends FormRequest
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
 
			'phone' => 'required|digits:10',

        ];
    }

  
    public function attributes()
    {
        return [

            
       
            'phone' => 'رقم الجوال',
         
            
   
        ];
    }



    
    public function messages()
    {
   
        return [

    'required' => ' <B> :attribute </B> حقل مطلوب',
    'unique' => '<B> :attribute </B> مسجل من قبل ',
    'digits' => '<B> :attribute </B> مكون من 10 رقم ',
    
        ];
    }




}
