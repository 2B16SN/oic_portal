<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'name_kana','authority_id','course_id','profile_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    public function profiles()
    {
        return $this->hasMany('App\Profile');
    }

    public function courses()
    {
        return $this->hasMany('App\Course','courses_id');
    }

    public function authoritys()
    {
        return $this->hasMany('App\Authority');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }
}
