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
            //'discount' => 'الخصم',
            'major' => 'التخصص',
            'status' => 'حالة الطالب',
            'status_disc' => 'تفصيل الحالة',
            'general_major' => ' التخصص العام',
            'acad_group' => 'المجموعة الأكاديمية',
            'student_level' => 'مستوى المرحلة الدراسية',
            //'total_hours' => 'مجموع الساعات',
            'GPA' => 'المعدل',
        ];
    }


    public function rules()
    {
        return [
            'name' => 'required|string',
            'student_id' => 'required|integer|min:9',
            'national_id' => 'required|integer',
            'major' => 'required',
            'status' => 'required',
            'general_major' => 'required',
            'student_level' => 'required',
            //'total_hours' => 'required',
            'GPA' => 'required|numeric|between:0.0,5',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'يجب ادخال الاسم ',
            'student_id.required' => 'يجب ادخال الرقم الجامعي بشكل صحيح',
            'national_id.required' => 'يجب ادخال رقم الهوية الوطنية / الإقامة',
            //'discount.required' => 'يجب اختيار نوع الخصم',
            'major.required' => 'يجب اختيار التخصص',
            'status.required' => 'يجب ادخال الحالة ',
            'general_major.required' => 'يجب ادخال التخصص العام',
            //'total_hours.required' => 'يجب ادخال مجموع الساعات',
            'GPA.required' => 'يجب ادخال المعدل',
            'student_level.required' => 'يجب المستوى',
        ];
    }
}
