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
        $email_regex = '^[_A-Za-z0-9-\\+]+(\\.[_A-Za-z0-9-]+)*+(@uod|@uohb).edu.sa^';
        return [
            'NID' => 'required|unique:reg_forms|numeric|min:1000000',
            'gender' => 'required|string',
            'fname' => 'required|string|min:3',
            'faname' => 'required|string|min:3',
            'gfaname' => 'required|string|min:3',
            'lname' => 'required|string|min:3',
            'birth_date'=>'required',
            'nationality'=>'required|string',
            'other_nationality'=>'required|string',
            'cellphone'=>'required|numeric|min:500000000',
            'email'=> array('required','unique:reg_forms','email','regex:'.$email_regex),
            'phone' => 'required|numeric',
            'qualification' => 'required|string',
            'qualification_identity_attach' => 'required|file|max:4096',
            'major' => 'required|string',
            'department' => 'required|string',
            'section' => 'required|string',
            'employee_ID' => 'numeric|required_without:is_contract',
            'job_title' => 'required|string',
            'other_job_title' => 'required|string',
            'supervisor' => 'required|string',
            'su_email' => array('required','email','regex:'.$email_regex),
            'su_phone' => 'required|numeric',
            'su_cellphone' => 'required|numeric|min:500000000',
            'IBAN' => 'required|string|size:24',
            'bank_name' => 'required|string',
            'account_holder_name' => 'required|string',
            'emergency_name' => 'required|string',
            'emer_relation' => 'required|string',
            'other_emer_relation' => 'required|string',
            'emer_cellphone' => 'required|numeric|min:500000000',
            'job_identity_attach' => 'required|file|max:4096',
            'el_exams_num' => 'required_if:el_exams_Before,1|numeric',
            'el_exams_Before' => 'required',
            'other_exams_Before' => 'required',
            'other_exams' => 'required_if:other_exams_Before,1|string',
            'center_first' => 'required|string',
            'center_second' => 'string',
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
            'email.regex' => trans('regform.emailregex'),
            'employee_ID.required_without' => 'الرقم الوظيفي مطلوب إلا في حال كانت الوظيفة بعقد',

        ];
    }

    public function attributes()
    {
        return [
            'NID' => trans('regform.NID'),
            'gender' => trans('regform.gender'),
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
            'qualification_identity_attach' => trans('regform.qia'),
            'major' => trans('regform.major'),
            'department' => trans('regform.department'),
            'section' => trans('regform.section'),
            'employee_ID' => trans('regform.employee_ID'),
            'job_title' => trans('regform.job_title'),
            'other_job_title' => trans('regform.other_job_title'),
            'supervisor' => trans('regform.supervisor'),
            'su_email' => trans('regform.su_email'),
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
            'el_exams_Before' => 'يكون قد سبق لك المراقبة على اختبارات التعليم عن بعد بجامعة الدمام',
            'other_exams_Before' => 'يكون قد سبق لك المراقبة على اختبارات ',
            'other_exams' => 'ذكر الاختبارت ',
            'center_first' => 'المركز المرغوب المراقبة فيه كرغبة أولى',
            'center_second' => 'المركز المرغوب المراقبة فيه كرغبة أولى',
            'el_exams_num' => trans('regform.el_exams_num'),


        ];
    }
}
