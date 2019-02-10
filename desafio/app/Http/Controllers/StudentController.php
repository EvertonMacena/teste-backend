<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Answers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{

     public function showAverage()
    {

        $allStudentsActives = Student::getStudentsActives();

        $allStudents = Student::all();

        $qtdAll = $allStudents->count();

        $qtdActives = $allStudentsActives->count();

        $regional = $allStudentsActives->first()->regional;

        $data = ['regional' => [], 'national' => ($qtdActives/$qtdAll)*100];

        $data['regional'][$regional] = 0;

        foreach ($allStudentsActives as $key => $student) {

            if ($key == $qtdActives -1){
                $data['regional'][$regional] += 1;
                $data['regional'][$regional] = ($data['regional'][$regional]/$qtdAll)*100;
                break;
            }

            if ($student->regional === $regional){
                $data['regional'][$regional] += 1;
                continue;
            }

            if ($student->regional !== $regional) {
                $data['regional'][$regional] = ($data['regional'][$regional]/$qtdAll)*100;
                $regional = $student->regional;
                $data['regional'][$regional] = 0;
                $data['regional'][$regional] += 1;
            }

        }
        return response()->json($data);
    }

    //
}
