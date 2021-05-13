<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;


    protected $guarded = [
        'id',
    ];


    // public static $rules = [
    //     'field_id' => 'required',
    //     'name' => 'required',
    // ];

}
