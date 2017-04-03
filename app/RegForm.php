<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegForm extends Model
{
    protected $fillable = [
        'NID',
        'fname',
        'faname',
        'gfaname',
        'lname',
        'gender',
        'birth_date',
        'nationality',
        'phone',
        'cellphone',
        'email',
        'qualification',
        'qualification_identity_file',
        'major',
        'department',
        'section',
        'employee_ID',
        'is_contract',
        'job_title',
        'supervisor',
        'su_phone',
        'su_cellphone',
        'su_email',
        'IBAN',
        'bank_name',
        'account_holder_name',
        'emergency_name',
        'emer_relation',
        'emer_cellphone',
        'center_first',
        'center_second',
        'user_id',
        'job_identity_file',
        'el_exams_Before',
        'el_exams_num',
        'other_exams_Before',
        'other_exams',
        'center_name',
        'isSV',
        'isInspector',
        'isController',
        'update_status',

    ];

    protected $casts = [
        'NID' => 'integer',
        'phone' => 'integer',
        'cellphone' => 'integer',
        'employee_ID' => 'integer',
        'su_phone' => 'integer',
        'su_cellphone' => 'integer',
        'emer_cellphone' => 'integer',
        'is_contract' => 'boolean',



    ];

   /* public function user()
    {
        return $this->hasOne('App/User');
    }*/

    public function getFormId()
    {
        return $this->id;
    }


}
