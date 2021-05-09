<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class AssessmentController extends Controller {
   /*public function insertform() {
      return view('stud_create');
   }*/

   public function insert(Request $request) {
      $assessmentNo = $request->input('assessmentNo');
      //DB::insert('insert into assessment_t (AssessmentNo) values(?)',[$AssessmentNo]);
      $assessmentType = $request->input('assessmentType');
      $achievedMark = $request->input('achievedMark');
      $questionNo = $request->input('questionNo');
      $course_id = $request->input('course_id');
      $section_no = $request->input('section_no');
      $student_id = $request->input('student_id');

      DB::table('assessment_t')->insert([
        'assessmentNo' => $assessmentNo,
        'achievedMark' => $achievedMark,
        'assessmentType' => $assessmentType,
        'questionNo' => $questionNo,
        'section_no' => $section_no,
        'student_id' => $student_id,
        'course_id' => $course_id
    ]);
      //DB::insert('insert into assessment_t (all) values(?)',[$data]);
    return redirect('assessment/insert')->with('status', 'Success!');



   }

}
