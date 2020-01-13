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
            'name' => 'required',
            'last_name' => 'required',
            'father_name' => 'required',
            'name_english' => 'required',
            'education' => 'required',
            'gender' => 'required',
            'social_status' => 'required',
            'number_escorts' => 'required',
            'nationality' => 'required',
            'personal_email' => 'required|email',
            'birth_date' => 'required',
            'birth_place' => 'required',
            'identification_number' => 'required',
            'identification_expiry' => 'required',
            'passport_number' => 'required',
            'passport_expiry' => 'required',
            'private_situation' => 'required',
            'work_place' => 'required',
            'work_start_at' => 'required',
            'job' => 'required',
            'job_type' => 'required',
            'department_id' => 'required',
            'manager_id' => 'required',
            'total_salary' => 'required',
            'basic_salary' => 'required',
            'housing_allowance' => 'required',
            //'role_id' => 'required',
			'email' => 'required|min:6|unique:users,email,'.$request->segment(3),
			'phone' => 'required|digits:10'

        ];
    }

  
    public function attributes()
    {
        return [

             'name' => 'الاسم الاول',
             'last_name' => 'اسم العائلة',
             'father_name' => 'اسم الاب',
             'name_english' => 'الاسم بالانجليزية',
             'education' => 'التعليم',
             'gender' => 'الجنس',
             'social_status' => 'الحالة الاجتماعية',
             'number_escorts' => 'عدد المرافقين',
             'nationality' => 'الجنسية',
             'personal_email' => 'الايميل الشخصى',
             'birth_date' => 'تاريخ الميلاد',
             'birth_place' => 'مكان الميلاد',
             'identification_number' => 'رقم الهوية',
             'identification_expiry' => 'تاريخ انتهاء الهوية',
             'passport_number' => 'رقم جواز السفر',
            'passport_expiry' => 'تاريخ انتهاء جواز السفر',
            'private_situation' => 'هل لديه وضع خاص؟',
            'work_place' => 'مكان العمل',
            'work_start_at' => 'تاريخ استلام العمل',
            'job' => 'المسمي الوظيفي',
            'job_type' => 'نوع الوظيفة',
            'department_id' => 'الادارة',
            'manager_id' => 'المدير المباشر',
            'total_salary' => 'الراتب الاجمالى',
            'basic_salary' => 'الراتب الاساسي',
            'housing_allowance' => 'بدل السكن',
            'email' => 'البريد الالكتروني',
			'phone' => 'رقم الجوال'
   
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
