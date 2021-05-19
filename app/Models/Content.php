<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id', 'field_name', 'staff_name', 'punch', 'remarks',
    ];

    public static $rules = [
        'staff_name' => 'required',
        'remarks' => 'required',
    ];

}
