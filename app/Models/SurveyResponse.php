<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get The survey belongs to response
     *
     */
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
