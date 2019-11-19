<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use App\Rules\Captcha;
use Illuminate\Foundation\Http\FormRequest;

class MembersRequest extends FormRequest
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

            'name' => 'required|string|max:255',
            //'email' => 'required|string|email|max:255|unique:users,email,'.$request->segment(3),
           // 'email' => 'required|string|email|max:255',
            'id_number' => 'required',
            //'phone' => 'required|unique:users,phone,'.$request->segment(3),
            'phone' => 'required',

        ];
    }









}
