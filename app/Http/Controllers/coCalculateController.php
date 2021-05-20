<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class coCalculateController extends Controller
{
    public function view(Request $request)
    {

        /* Input Section */
        $course_id = $request->input('course_id');
        $student_id = $request->input('student_id');
        $section_no = $request->input('section_no');
        $semester_id = $request->input('semester_id');

        /* Analysis Algorithm */

        $CO1_ACH = DB::table('assessment_t')
        ->where('course_id', $course_id)
        ->where('student_id', $student_id)
        ->where('section_no', $section_no)
        ->where('semester_id', $semester_id)
        ->where('co_id', 'CO1')
        ->sum('achievedMark');

        $CO1_MAX = DB::table('assessment_t')
        ->where('course_id', $course_id)
        ->where('student_id', $student_id)
        ->where('section_no', $section_no)
        ->where('semester_id', $semester_id)
        ->where('co_id', 'CO2')
        ->sum('maxMarks');

        $CO2_ACH = DB::table('assessment_t')
        ->where('course_id', $course_id)
        ->where('student_id', $student_id)
        ->where('section_no', $section_no)
        ->where('semester_id', $semester_id)
        ->where('co_id', 'CO2')
        ->sum('achievedMark');

        $CO2_MAX = DB::table('assessment_t')
        ->where('course_id', $course_id)
        ->where('student_id', $student_id)
        ->where('section_no', $section_no)
        ->where('semester_id', $semester_id)
        ->where('co_id', 'CO2')
        ->sum('maxMarks');

        $CO3_ACH = DB::table('assessment_t')
        ->where('course_id', $course_id)
        ->where('student_id', $student_id)
        ->where('section_no', $section_no)
        ->where('semester_id', $semester_id)
        ->where('co_id', 'CO3')
        ->sum('achievedMark');

        $CO3_MAX = DB::table('assessment_t')
        ->where('course_id', $course_id)
        ->where('student_id', $student_id)
        ->where('section_no', $section_no)
        ->where('semester_id', $semester_id)
        ->where('co_id', 'CO3')
        ->sum('maxMarks');

        $CO4_ACH = DB::table('assessment_t')
        ->where('course_id', $course_id)
        ->where('student_id', $student_id)
        ->where('section_no', $section_no)
        ->where('semester_id', $semester_id)
        ->where('co_id', 'CO4')
        ->sum('achievedMark');

        $CO4_MAX = DB::table('assessment_t')
        ->where('course_id', $course_id)
        ->where('student_id', $student_id)
        ->where('section_no', $section_no)
        ->where('semester_id', $semester_id)
        ->where('co_id', 'CO4')
        ->sum('maxMarks');

        $CO_ACH = $CO1_ACH + $CO2_ACH + $CO3_ACH + $CO4_ACH;
        $CO_MAX = $CO1_MAX + $CO2_MAX + $CO3_MAX + $CO4_MAX;

        $CO_R = (($CO_ACH/$CO_MAX)*100);



        if($total_achievedMarks >=85){
            $gpa = 4;
            $grade = 'A';
        }
        elseif($total_achievedMarks >=80 and $total_achievedMarks <85){
            $gpa = 3.7;
            $grade = 'A-';
        }
        elseif($total_achievedMarks >=75 and $total_achievedMarks <80){
            $gpa = 3.3;
            $grade = 'B+';
        }
        elseif($total_achievedMarks >=70 and $total_achievedMarks <75){
            $gpa = 3;
            $grade = 'B';
        }
        elseif($total_achievedMarks >=65 and $total_achievedMarks <70){
            $gpa = 2.7;
            $grade = 'B-';
        }
        elseif($total_achievedMarks >=60 and $total_achievedMarks <65){
            $gpa = 2.3;
            $grade = 'C+';
        }
        elseif($total_achievedMarks >=55 and $total_achievedMarks <60){
            $gpa = 2;
            $grade = 'C';
        }
        elseif($total_achievedMarks >=50 and $total_achievedMarks <55){
            $gpa = 1.7;
            $grade = 'C-';
        }
        elseif($total_achievedMarks >=45 and $total_achievedMarks <50){
            $gpa = 1.3;
            $grade = 'D+';
        }
        elseif($total_achievedMarks >=40 and $total_achievedMarks <45){
            $gpa = 1;
            $grade = 'D';
        }
        elseif($total_achievedMarks <40){
            $gpa = 0;
            $grade = 'F';
        }

        else
        $grade = "No grade";

        $id1 = DB::table('evaluation_t')->pluck('student_id');
        $id = json_decode($id1, true);
        $degreeProgram_id1 =DB::table('courseoffered_t')->where('course_id', $course_id)->pluck('degreeProgram_id');
        $degreeProgram_id2 = json_decode($degreeProgram_id1);
        $degreeProgram_id =implode("",$degreeProgram_id2);
        $department_id1 =DB::table('degreeprogram_t')->where('degreeProgram_id', $degreeProgram_id)->pluck('department_id');
        $department_id2 = json_decode($department_id1);
        $department_id =implode("",$department_id2);
        $school_id1 =DB::table('department_t')->where('department_id', $department_id)->pluck('school_id');
        $school_id2 = json_decode($school_id1);
        $school_id =implode("",$school_id2);
        $instructor_id1 =DB::table('section_t')->where('course_id', $course_id)->where('section_no', $section_no)->pluck('instructor_id');
        $instructor_id2 = json_decode($instructor_id1);
        $instructor_id =implode("",$instructor_id2);


        if(in_array($student_id, $id)){
        }
            else{
                DB::table('evaluation_t')->insert([
                    'student_id' => $student_id,
                    'course_id' => $course_id,
                    'school_id' => $school_id,
                    'obtainedMarks' => $total_achievedMarks,
                    'section_no' => $section_no,
                    'department_id' => $department_id,
                    'gpa' => $gpa,
                    'semester_id' => $semester_id,
                    'instructor_id' => $instructor_id,
                    'grade' => $grade,
                    'degreeProgram_id' => $degreeProgram_id
                ]);
            }







        $results =  DB::table('evaluation_t')
                    ->where('course_id', $course_id)
                    ->where('student_id', $student_id)
                    ->where('section_no', $section_no)
                    ->get();

        return view('assessment.calculate', compact('results'));
    }

}
