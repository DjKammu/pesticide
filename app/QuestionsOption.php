<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionsOption extends Model
{
    protected $fillable = ['option_text', 'correct', 'question_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setQuestionIdAttribute($input)
    {
        $this->attributes['question_id'] = $input ? $input : null;
    }
    
    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
