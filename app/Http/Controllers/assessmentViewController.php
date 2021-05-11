<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class assessmentViewController extends Controller
{
    public function view(Request $request) {
        $course_id= $request->input('course_id');
        $student_id = $request->input('student_id');
        $section_no = $request->input('section_no');

        // var_dump($course_id);
        // var_dump($student_id);
        // var_dump($section_no);

        $results = DB::table('assessment_t')
                ->where('course_id', $course_id)
                ->where('student_id', $student_id)
                ->where('section_no', $section_no)
                ->orderBy('assessmentType')
                ->orderBy('assessmentNo')
                ->orderBy('questionNo')
                ->get();


    //   $bool=[0];
    return view('assessment.view', compact('results'));
      //return view('assessment.view', ['results' => $results], ['bool' => $bool] );
      //return view('assessment.view')->with('bool', $bool)->with('results', $results);
      //return view('assessment.view')->with('results', $results)->
                //with('bool', 'bool');



     }


}
