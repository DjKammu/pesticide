<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['title', 'slug', 'lesson_image', 'short_text', 'full_text', 'position', 
    'downloadable_files', 'free_lesson', 'published', 'course_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCourseIdAttribute($input)
    {
        $this->attributes['course_id'] = $input ? $input : null;
    }

    public function setDownloadableFilesAttribute($files)
	{
	    if (is_array($files)) {
	        $this->attributes['downloadable_files'] = json_encode($files);
	    }
	}

	public function getDownloadableFilesAttribute($files)
	{
	    return json_decode($files, true);
	}

    // /**
    //  * Set attribute to money format
    //  * @param $input
    //  */
    // public function setPositionAttribute($input)
    // {
    //     $this->attributes['position'] = $input ? $input : null;
    // }
    
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    // public function test() {
    //     return $this->hasOne('App\Test');
    // }

    // public function students()
    // {
    //     return $this->belongsToMany('App\User', 'lesson_student')->withTimestamps();
    // }
}
