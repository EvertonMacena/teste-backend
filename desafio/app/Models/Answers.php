<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Alternative;
use App\Models\Question;
use App\Models\Student;

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

        return $this->belongsTo(Student::class);

    }

    public function question ()
    {

        return $this->belongsTo(Question::class);

    }

    public function alternative()
    {

        return $this->belongsTo(Alternative::class);

    }


}