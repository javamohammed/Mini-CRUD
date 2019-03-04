<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $table = 'employees';

    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'id_company'
    ];

     public function Company()
    {
        return $this->hasOne('App\Company', 'id','id_company');
    }
}
