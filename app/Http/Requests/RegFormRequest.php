<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegFormRequest extends Request
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
        $email_regex = '^[_A-Za-z0-9-\\+]+(\\.[_A-Za-z0-9-]+)*@uod.edu.sa^';
        return [
            'NID' => 'required|unique:reg_forms|integer|min:1000000',
            'fname' => 'required|string|min:3',
            'faname' => 'required|string|min:3',
            'gfaname' => 'required|string|min:3',
            'lname' => 'required|string|min:3',
            'birth_date'=>'required',
            'nationality'=>'required|string',
            'other_nationality'=>'required|string',
            'cellphone'=>'required|integer|min:500000000',
            'email'=>'required|email|regex:'.$email_regex,
            'phone' => 'required|integer',
            'qualification' => 'required|string',
            'major' => 'required|string',
            'department' => 'required|string',
            'section' => 'required|string',
            'employee_ID' => 'integer',
            'job_title' => 'required|string',
            'other_job_title' => 'required|string',
            'supervisor' => 'required|string',
            'su_phone' => 'required|integer',
            'su_cellphone' => 'required|integer|min:500000000',
            'IBAN' => 'required|string|size:24',
            'bank_name' => 'required|string',
            'account_holder_name' => 'required|string',
            'emergency_name' => 'required|string',
            'emer_relation' => 'required|string',
            'other_emer_relation' => 'required|string',
            'emer_cellphone' => 'required|integer|min:500000000',
            'job_identity_attach' => 'required|file|max:1500',
        ];
    }

    public function messages()
    {
        return [
            /*'NID.required' => 'National/Eqamah ID is required',
            'NID.size' => 'National/Eqamah ID is not a valid number',
            'fname.requried' => 'First name is required',
            'fname.string' => 'First name must be only in letters',
            'faname.requried' => 'Father name is required',
            'faname.string' => 'Father name must be only in letters',
            'gfaname.requried' => 'Grandfather name is required',
            'gfaname.string' => 'Grandfather name must be only in letters',
            'lname.requried' => 'Last name is required',*/
            //'lname.string' => 'Last name must be only in letters',
            'email.regex' => 'The :attribute must be a valid UOD email'

        ];
    }

    public function attributes()
    {
        return [
            'NID' => trans('regform.NID'),
            'fname' => trans('regform.fname'),
            'faname' => trans('regform.faname'),
            'gfaname' => trans('regform.gfaname'),
            'lname' => trans('regform.lname'),
            'birth_date' => trans('regform.birth_date'),
            'nationality' => trans('regform.nationality'),
            'other_nationality'=>trans('regform.other_nationality'),
            'cellphone' => trans('regform.cellphone'),
            'email' => trans('regform.email'),
            'phone' => trans('regform.phone'),
            'qualification' => trans('regform.qualification'),
            'major' => trans('regform.major'),
            'department' => trans('regform.department'),
            'section' => trans('regform.section'),
            'employee_ID' => trans('regform.employee_ID'),
            'job_title' => trans('regform.job_title'),
            'other_job_title' => trans('regform.other_job_title'),
            'supervisor' => trans('regform.supervisor'),
            'su_phone' => trans('regform.su_phone'),
            'su_cellphone' => trans('regform.su_cellphone'),
            'IBAN' => trans('regform.IBAN'),
            'bank_name' => trans('regform.bank_name'),
            'account_holder_name' => trans('regform.account_holder_name'),
            'emergency_name' => trans('regform.emergency_name'),
            'emer_relation' => trans('regform.emer_relation'),
            'other_emer_relation' => trans('regform.other_emer_relation'),
            'emer_cellphone' => trans('regform.emer_cellphone'),
            'job_identity_attach' => trans('regform.job_identity_attach'),


        ];
    }
}
