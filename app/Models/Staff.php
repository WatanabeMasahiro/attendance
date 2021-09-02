<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
<<<<<<< HEAD
=======


    protected $guarded = [
        'id',
    ];


    public function field_s()
    {
        return $this->belongsTo('App\Models\Field');
    }

>>>>>>> test1
}
