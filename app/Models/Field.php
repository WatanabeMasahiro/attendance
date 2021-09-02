<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;
<<<<<<< HEAD
=======


    protected $guarded = [
        'id',
    ];


    public static $rules = [
        'name' => 'required|unique:fields,name',
    ];


    public function staff_s()
    {
        return $this->hasMany('App\Models\Staff');
    }

>>>>>>> test1
}
