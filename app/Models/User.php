<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
<<<<<<< HEAD
=======
use App\Notifications\JaPasswordReset;
>>>>>>> test1

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
<<<<<<< HEAD
=======
        'pagepass',
        'department_onsite'
    ];

    public static $rules = [
        // 'name' => 'required',
        'email' => 'required|unique:users,email',
        // 'pagepass' => 'required',
        // 'department_onsite'  => 'required'
>>>>>>> test1
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
<<<<<<< HEAD
=======


    public function staffs()
    {
        return $this->hasmany('App\Models\Staff');
    }

    public function fields()
    {
        return $this->hasmany('App\Models\Field');
    }

    public function contents()
    {
        return $this->hasmany('App\Models\Content');
    }


    /**
    * パスワードリセット通知の送信
    *
    * @param  string  $token
    * @return void
    */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new JaPasswordReset($token));
    }


>>>>>>> test1
}
