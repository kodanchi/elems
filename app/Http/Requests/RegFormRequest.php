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
            'NID' => 'required|integer|min:1000000',
            'fname' => 'required|string|min:3',
            'faname' => 'required|string|min:3',
            'gfaname' => 'required|string|min:3',
            'lname' => 'required|string|min:3',
            'birth_date'=>'required',
            'nationality'=>'required|string',
            'cellphone'=>'required|integer',
            'email'=>'required|email|regex:'.$email_regex,
            'phone' => 'required|integer',
            'qualification' => 'required|string',
            'major' => 'required|string',
            'department' => 'required|string',
            'section' => 'required|string',
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
            'NID' => 'National/Eqamah ID',
            'fname' => 'First name',
            'faname' => 'Father name',
            'gfaname' => 'Grandfather name',
            'lname' => 'Last name',
            'birth_date' => 'Birth date',
            'nationality' => 'Nationality',
            'cellphone' => 'Cellphone',
            'email' => 'Email',


        ];
    }
}
