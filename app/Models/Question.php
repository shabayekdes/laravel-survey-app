<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the questionnaire belongs to question
     *
     */
    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }

    /**
     * Get the answers of question
     *
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    
    /**
     * Get The responses of answer
     *
     */
    public function responses()
    {
        return $this->hasMany(SurveyResponse::class);
    }
}
