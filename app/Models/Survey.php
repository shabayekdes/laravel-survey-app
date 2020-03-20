<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get The questionnaire belongs to survey
     *
     */
    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }

    /**
     * Get The responses of survey
     *
     */
    public function responses()
    {
        return $this->hasMany(SurveyResponse::class);
    }
}
