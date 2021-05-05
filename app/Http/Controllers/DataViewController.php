<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DataViewController extends Controller
{
    public function getView()
    {
        $ViewAssessmentType = DB::table('viewassesmenttype')->pluck("name");
        return view('student-report',compact('ViewAssessmentType'));

    }
}
