<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //

    protected $table = 'companies';

    protected $fillable = [
        'name', 'email', 'logo', 'website'
    ];

     public function employees()
    {
        return $this->hasMany('App\Employee','id_company','id');
    }
}
