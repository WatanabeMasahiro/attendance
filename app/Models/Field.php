<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;


    protected $guarded = [
        'id',
    ];


    // public static $rules = [
    //     'name' => 'required',
    // ];


    public function staff_s()
    {
        return $this->hasMany('App\Models\Staff');
    }

}
