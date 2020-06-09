<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Encore\Admin\Auth\Database\Administrator;

class Course extends Model implements HasMedia
{
	use HasMediaTrait;

    CONST PUBLISHED = 1;

    CONST YES = 'Yes';

    CONST NO = 'No';
    
    CONST PER_PAGE = 6;

    CONST SINGLE_PER_PAGE = 4;
 
    public function teachers(){
        return $this->belongsToMany(User::class,'course_user')->withTimestamps();
    }

    public function lessons(){
        return $this->hasMany(Lesson::class);
    }


}
