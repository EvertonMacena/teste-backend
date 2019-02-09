<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{

    protected $table = 'answers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'student_id', 'question_id', 'alternative_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function student ()
    {

        return $this->belongsTo('App\Models\Student');

    }

    public function question ()
    {

        return $this->belongsTo('App\Models\Question');

    }

    public function alternative ()
    {

        return $this->belongsTo('App\Models\Alternative');

    }


}