<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute يجب ان تتم الموافقة عليه',
    'active_url'           => ':attribute لا يعتبر رابط صالح',
    'after'                => ':attribute يجب أن يكون تاريخ بعد :date',
    'alpha'                => ':attribute يجب أن يحتوي فقط على حروف',
    'alpha_dash'           => ':attribute يجب أن يحتوي فقط على حروف، أرقام و شرطات (داش)',
    'alpha_num'            => ':attribute يجب أن يحتوي على حروف و أرقام',
    'array'                => ':attribute يجب ان يكون مصفوفة',
    'before'               => ':attribute يجب أن يكون تاريخ قبل :date',
    'between'              => [
        'numeric' => ':attribute يجب أن يكون بين :min و :max',
        'file'    => ':attribute يجب ان يكون بين :min و :max كيلوبايت',
        'string'  => ':attribute يجب ان يكون بين :min و :max حرف',
        'array'   => ':attribute يجب ان يكون بين :min و :max عنصر',
    ],
    'boolean'              => ':attribute يجب أن يكون دالاً على صح أو خطاً',
    'confirmed'            => ':attribute للتأكد غير متطابقة',
    'date'                 => ':attribute ليس تاريخ صالح',
    'date_format'          => ':attribute تاريخ ليس بتاريخ يطابق الصيغة  :format.',
    'different'            => ':attribute يجب أن تختلف عن :other',
    'digits'               => ':attribute يجب أن يكون يكون :digits ارقام',
    'digits_between'       => ':attribute يجب أن يكون بين :min و :max أرقام',
    'distinct'             => ':attribute يحتوي على قيمة مكررة',
    'email'                => ':attribute يجب أن يكون ايميل صالح',
    'exists'               => ':attribute المختار غير صالح',
    'filled'               => ':attribute مطلوب',
    'image'                => ':attribute يجب أن يكون صورة',
    'in'                   => ':attribute المختار غير صالح',
    'in_array'             => ':attribute غير متواجد في :other.',
    'integer'              => ':attribute يجب ان يكون رقم',
    'ip'                   => ':attribute يجب ان يكون اي بي صالح',
    'json'                 => ':attribute يجب ان يكون نص بصيغة جسون',
    'max'                  => [
        'numeric' => ':attribute يجب ان لا تكون أكبر من :max',
        'file'    => ':attribute يجب أن لا تكون بأكبر من :max كيلوبايت.',
        'string'  => ':attribute يجب أن لاتكون بأكبر من :max حرف.',
        'array'   => ':attribute يجب أن لا تكون بأكبر من :max عنصر.',
    ],
    'mimes'                => ':attribute يجب أن يكون بصيغة: :values.',
    'min'                  => [
        'numeric' => ':attribute يجب أن يكون على الأقل :min.',
        'file'    => ':attribute يجب أن يكون على الأقل :min كيلوبايت.',
        'string'  => ':attribute يجب أن يكون على الأقل :min حروف.',
        'array'   => ':attribute يجب أن يكون على الأقل :min عنصر.|:attribute يجب أن يكون على الأقل :min عناصر.',
    ],
    'not_in'               => ':attribute المختار غير صالح.',
    'numeric'              => ':attribute يجب أن يكون عدد.',
    'present'              => ':attribute يجب أن يكون حاضر.',
    'regex'                => ':attribute يحتوي صيغة غير صالحة',
    'required'             => 'يجب تعبئة :attribute',
    'required_if'          => ':attribute مطلوب عندما :other تكون :value.',
    'required_unless'      => ':attribute مطلوب إلا في حال :other يكون في :values.',
    'required_with'        => 'مطلوب عندما :values تكون حاضره.',
    'required_with_all'    => ':attribute يكون مطلوب في حال :values كانوا حاضرين.',
    'required_without'     => ':attribute مطلوب في حال :values لم يكونوا حاضرين.',
    'required_without_all' => ':attribute مطلوب في حال ولا اي من :values حاضر.',
    'same'                 => ':attribute يجب ان يكون متطابق مع :other.',
    'size'                 => [
        'numeric' => ':attribute يجب ان يكون بحجم :size.',
        'file'    => ':attribute يجب ان يكون بحجم :size كيلوبايت.',
        'string'  => ':attribute يجب ان يكون بحجم :size حرف.',
        'array'   => ':attribute يجب ان يكون بحجم :size عنصر.',
    ],
    'string'               => ':attribute يجب أن يكون نص.',
    'timezone'             => ':attribute يجب أن يكون منطقة زمنية.',
    'unique'               => ':attribute المدخل موجود مسبقاً في قاعدة البيانات.',
    'url'                  => 'صيغة :attribute يجب ان تكون صالحة.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
