<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
<<<<<<< HEAD
=======


    protected $dates = ['edited_at'];

    protected $fillable = [
        'user_id', 'field_name', 'staff_name', 'punch', 'remarks', 'edited_at',
    ];

    public static $rules = [
        // 'staff_name' => 'accepted',
        'remarks' => 'max:1200',
    ];

    // const CREATED_AT = NULL;
    // const UPDATED_AT = NULL;

    /**
     * `updated_at`の自動挿入の無効化
     *
     * @param mixed $value
     * @return $this
     */
    // public function setUpdatedAt($value)
    // {
    //     return $this;
    // }
>>>>>>> test1
}
