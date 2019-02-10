<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Answers;

use Illuminate\Support\Facades\DB;

class Student extends Model
{

    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'regional'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];


    public function answers()
    {

         return $this->hasMany(Answers::class);

    }

    public static function getStudentsActives()
    {

        $allAnswers =DB::table('answers')
            ->join('students', 'answers.student_id', '=', 'students.id')
            ->join('alternatives', 'answers.alternative_id', '=', 'alternatives.id')
            ->select('students.*')
            ->where('alternatives.description', 'Sim')
            ->orderBy('students.regional')
            ->get();

        return $allAnswers;
    }

}