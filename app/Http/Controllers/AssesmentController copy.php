<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class StudInsertController extends Controller {
   public function insertform() {
      return view('stud_create');
   }

   public function insert(Request $request) {
      $AssessmentNo = $request->input('AssessmentNo');
      //DB::insert('insert into assessment_t (AssessmentNo) values(?)',[$AssessmentNo]);
     // $viewassesmenttype = DB::select('viewassesmenttype');

      /*$viewassesmenttype = viewassesmenttype::all()->toArray();
        return view('student-report', compact('viewassesmenttype'));*/
      $AssessmentType = $request->input('AssessmentType');
      $AssessmentMarks = $request->input('AssessmentMarks');
      DB::table('assessment_t')->insert([
        'AssessmentNo' => $AssessmentNo,
        'AssessmentMarks' => $AssessmentMarks,
        'AssessmentType' => $AssessmentType
    ]);
      //DB::insert('insert into assessment_t (all) values(?)',[$data]);
      //return view('student-report',['viewassesmenttype'=>$viewassesmenttype]);
      return redirect('student-report')->with('status', 'Success!');


   }
}
