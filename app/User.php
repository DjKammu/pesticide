<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use App\UserInfo;
use Hash;

class User extends Authenticatable implements HasMedia
{
    use Notifiable;

    use HasMediaTrait;

    CONST ROLE_TEACHER = 'Teacher';

    CONST ROLE_STUDENT  = 'Student';

    CONST PER_PAGE = 20;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function UserInfo(){
      return $this->hasOne(UserInfo::class);
    }
    
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }

    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user')->withTimestamps();
    }

    // public function isAdmin()
    // {
    //     return $this->role()->where('role_id', 1)->first();
    // }
}
