<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students_absence extends Model
{

    protected $table='Students_absence';
    protected $fillable=[
        'id',
        'date',
        'course',
        'students_id',
        'status',
       'created_at',
        'updated_at',
    ];






}
