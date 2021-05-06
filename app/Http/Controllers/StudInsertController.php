<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class StudInsertController extends Controller {
   /*public function insertform() {
      return view('stud_create');
   }*/

   public function insert(Request $request) {
      $assessmentNo = $request->input('assessmentNo');
      //DB::insert('insert into assessment_t (AssessmentNo) values(?)',[$AssessmentNo]);
      /*$courselist = DB::table('assessment_t')
            ->join('course_t', 'assessment_t.course_id', '=', 'course_t.course_id')
           // ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('assessment_t.course_id', 'course_t.courseName')
            ->get();*/



      //$viewassesmenttype = viewassesmenttype::all()->toArray();
      //return view('student-report', compact('courselist'));
      $assessmentType = $request->input('assessmentType');
      $achievedMark = $request->input('achievedMark');
      $questionNo = $request->input('questionNo');
      DB::table('assessment_t')->insert([
        'assessmentNo' => $assessmentNo,
        'achievedMark' => $achievedMark,
        'assessmentType' => $assessmentType,
        'questionNo' => $questionNo
    ]);

    //return view('student-report', compact('viewassesmenttype'));
      //DB::insert('insert into assessment_t (all) values(?)',[$data]);

      //return view('student-report',['viewassesmenttype'=>$viewassesmenttype]);
    return redirect('student-report')->with('status', 'Success!');



   }

//    public function courselist(){
//        $courselist1= DB::table('course_t')->pluck('courseName');
//        var_dump($courselist1);
//        //return view('pages.tables', compact('courselist'));
//    }
}
