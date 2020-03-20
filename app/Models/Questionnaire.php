<?php

namespace App\Models;

use App\Models\User;
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
}
