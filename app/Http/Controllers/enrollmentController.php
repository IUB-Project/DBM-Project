<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class enrollmentController extends Controller {
   /*public function insertform() {
      return view('stud_create');
   }*/

   public function insert(Request $request) {
      $student_id = $request->input('student_id');
      $degreeProgram_id = $request->input('degreeProgram_id');
      $enrollmentDate = $request->input('enrollmentDate');

      $phone = $request->input('phone');
      $fName = $request->input('fName');
      $lName = $request->input('lName');
      $dateOfBirth = $request->input('dateOfBirth');
      $gender = $request->input('gender');
      $email = $request->input('email');
      $address = $request->input('address');
      $department_id = $request->input('department_id');
      $semester_id = $request->input('semester_id');
      $school_id = $request->input('school_id');


      DB::table('student_t')->insert([
        'student_id' => $student_id,
        'fName' => $fName,
        'lName' => $lName,
        'dateOfBirth' => $dateOfBirth,
        'gender' => $gender,
        'email' => $email,
        'address' => $address,
        'phone' => $phone,
        'department_id' => $department_id


    ]);

      DB::table('enrollment_t')->insert([
        'student_id' => $student_id,
        'degreeProgram_id' => $degreeProgram_id,
        'enrollmentDate' => $enrollmentDate,
        'department_id' => $department_id,
        'school_id' => $school_id,
        'semester_id' => $semester_id
    ]);
      //DB::insert('insert into assessment_t (all) values(?)',[$data]);
    return redirect('enrollment/insert')->with('status', 'Success!');



   }

}
