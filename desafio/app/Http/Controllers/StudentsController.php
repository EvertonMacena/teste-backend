<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;


class StudentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

     public function showAverage()
    {
        return response()->json(Students::average());
    }

    //
}
