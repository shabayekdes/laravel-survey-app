<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Path to show questionnaire
     *
     */
    public function path()
    {
        return url('/questionnaires/' . $this->id);
    }

    /**
     * Public path of survey related to questionnaire
     *
     */
    public function publicPath()
    {
        return url('/surveys/' . $this->id . '-' . Str::slug($this->title));
    }
    /**
     * Get The user belongs to questionnaire
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get The questions of questionnaire
     *
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Get The surveys of questionnaire
     *
     */
    public function surveys()
    {
        return $this->hasMany(Survey::class);
    }
}
