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
        'birth_date',
        'nationality',
        'phone',
        'cellphone',
        'email',
        'qualification',
        'major',
        'department',
        'section',
        'employee_ID',
        'is_contract',
        'job_title',
        'supervisor',
        'su_phone',
        'su_cellphone',
        'IBAN',
        'bank_name',
        'account_holder_name',
        'emergency_name',
        'emer_relation',
        'emer_cellphone',
        'center_name',
        'user_id',
        'job_identity_file'

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
