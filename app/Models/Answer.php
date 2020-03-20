<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get The question belongs to answer
     *
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
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
