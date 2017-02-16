<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{

    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /*public function emrForm()
    {
        return $this->hasOne('App\RegForm');
    }*/

    public function getRole()
    {
        //dd('dsds');
        return $this->role;
    }

    public function getId()
    {
        return $this->id;
    }
     public function getAllroles()
    {
        $roles=DB::select('select role from roles where user_id=?',[$this->id]);
        foreach ($roles as $role){

            $rolesArr[$role->role]=$role->role;
        }
        return $rolesArr;
    }


}
