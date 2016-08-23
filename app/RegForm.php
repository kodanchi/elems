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
    ];
}
