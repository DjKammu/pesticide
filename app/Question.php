<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question', 'question_image', 'score'];
    
    CONST YES = 'Yes';

    CONST NO = 'No';
    /**
     * Set attribute to money format
     * @param $input
     */
    public function setScoreAttribute($input)
    {
        $this->attributes['score'] = $input ? $input : null;
    }

    public function options()
    {
        return $this->hasMany('App\QuestionsOption');
    }

    // public function tests()
    // {
    //     return $this->belongsToMany(Test::class, 'question_test');
    // }
}
