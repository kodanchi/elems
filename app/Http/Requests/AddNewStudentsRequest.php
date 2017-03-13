<?php

namespace App\Http\Requests;


class AddNewStudentsRequest extends Request
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

    public function attributes()
    {
        return [

            'name' => 'الأسم الرباعي',
            'student_id' => 'الرقم الأكاديمي',
            'national_id' => 'رقم الهوية',
            'balance' => 'الرصيد',
            'discount' => 'الخصم',
            'major' => 'التخصص',
        ];
    }


    public function rules()
    {
        return [
            'name' => 'required|string',
            'student_id' => 'required|integer|min:9',
            'national_id' => 'required|integer',
            'balance' => 'required',
            'major' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'يجب ادخال الاسم ',
            'student_id.required' => 'يجب ادخال الرقم الجامعي بشكل صحيح',
            'national_id.required' => 'يجب ادخال رقم الهوية الوطنية / الإقامة',
            'discount.required' => 'يجب اختيار نوع الخصم',
            'major.required' => 'يجب اختيار التخصص',
        ];
    }
}
