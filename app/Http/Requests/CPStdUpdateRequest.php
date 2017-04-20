<?php

namespace App\Http\Requests;


class CPStdUpdateRequest extends Request
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

            'name1' => 'الاسم الأول',
            'name2' => 'اسم الأب',
            'name3' => 'اسم الجد',
            'name4' => 'اسم العائلة',
            'name8' => ' الاسم الأول باللغة الانجليزية',
            'name7' => ' اسم الأب باللغة الانجليزية',
            'name6' => ' اسم الجد باللغة الانجليزية',
            'name5' => '  اسم العائلة باللغة الانجليزية',
            'Phone' => 'رقم الجوال',
            'Nationally' => 'الجنسية',
            //'Graduation_Date' => 'تاريخ التخرج',
            //'Birth_day' => 'تاريخ الميلاد',
            'Graduation_Place' => ' مكان التخرج',
            'School_name' => 'اسم المدرسة',
            'HS_pers' => 'نسبة الثانوية',
            'attachment1' => 'file|max:4096',
            'attachment2' => 'file|max:4096',

        ];
    }


    public function rules()
    {
        return [
            'name1' => 'required|string',
            'name2' => 'required|string',
            'name3' => 'required|string',
            'name4' => 'required|string',
            'name5' => 'required|string',
            'name6' => 'required|string',
            'name7' => 'required|string',
            'name8' => 'required|string',
            'Phone' => 'required|numeric|min:10',
            'Nationally' => 'required',
            //'Graduation_Date' => 'required',
            'other_nationality'=>'required|string',
            //'Birth_day' => 'required',
            'Graduation_Place' => 'required|string',
            'School_name' => 'required|string',
            'HS_pers' => 'required|numeric|between:0.0,100',


        ];
    }

    public function messages()
    {
        return [

            'name1' => 'يجب ادخال الاسم الأول',
            'name2' => 'يجب ادخال اسم الأب',
            'name3' => 'يجب ادخال اسم الجد',
            'name4' => 'يجب ادخال اسم العائلة',
            'name8' => ' يجب ادخال الاسم الأول باللغة الانجليزية',
            'name7' => '  يجب ادخال اسم الأب باللغة الانجليزية',
            'name6' => ' يجب ادخال اسم الجد باللغة الانجليزية',
            'name5' => ' يجب ادخال اسم العائلة باللغة الانجليزية',
            'Phone' => 'يجب ادخال رقم الجوال بشكل صحيح ',
            'Nationally' => 'يجب اختيار الجنسية الجنسية',
            'Graduation_Date' => ' يجب اختيار تاريخ التخرج',
            'Birth_day' => ' يجب اختيار تاريخ الميلاد',
            'Graduation_Place' => 'يجب ادخال مكان التخرج',
            'School_name' => 'يجب ادخال اسم المدرسة',
            'HS_pers' => 'يجب ادخال نسبة الثانوية',

            ];
    }
}
