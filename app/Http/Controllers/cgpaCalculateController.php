<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class cgpaCalculateController extends Controller
{
    public function view(Request $request)
    {

        /* Input Section */
        // $degreeProgram_id = $request->input('degreeProgram_id');
        // $department_id = $request->input('department_id');
        // $school_id = $request->input('school_id');
        // $semester_id = $request->input('semester_id');
        $course_id = $request->input('course_id');
        $student_id = $request->input('student_id');
        $section_no = $request->input('section_no');

        /* Variables: eCS1-5 */

        $Mid_achieved = DB::table('assessment_t')
        ->where('course_id', $course_id)
        ->where('student_id', $student_id)
        ->where('section_no', $section_no)
        ->where('assessmentType', 'Mid')
        ->sum('achievedMark');

        $Mid_total = DB::table('assessment_t')
        ->where('course_id', $course_id)
        ->where('student_id', $student_id)
        ->where('section_no', $section_no)
        ->where('assessmentType', 'Mid')
        ->sum('maxMarks');

        $mid_r = (($Mid_achieved/$Mid_total)*100);
        $mid_r_c = ($mid_r/30);

        $Final_achieved = DB::table('assessment_t')
        ->where('course_id', $course_id)
        ->where('student_id', $student_id)
        ->where('section_no', $section_no)
        ->where('assessmentType', 'Final')
        ->sum('achievedMark');

        $Final_total = DB::table('assessment_t')
        ->where('course_id', $course_id)
        ->where('student_id', $student_id)
        ->where('section_no', $section_no)
        ->where('assessmentType', 'Final')
        ->sum('maxMarks');

        $Final_r = (($Final_achieved/$Final_total)*100);
        $Final_r_c = ($Final_r/40);

        $project_achieved = DB::table('assessment_t')
        ->where('course_id', $course_id)
        ->where('student_id', $student_id)
        ->where('section_no', $section_no)
        ->where('assessmentType', 'Assignment')
        // ->where('assessmentType', 'Report')
        // ->where('assessmentType', '	Quiz')
        // ->where('assessmentType', '	Presentation')
        ->sum('achievedMark');

        $project_total = DB::table('assessment_t')
        ->where('course_id', $course_id)
        ->where('student_id', $student_id)
        ->where('section_no', $section_no)
        ->where('assessmentType', 'Assignment')
        // ->where('assessmentType', 'Report')
        // ->where('assessmentType', '	Quiz')
        // ->where('assessmentType', '	Presentation')
        ->sum('maxMarks');

        $project_r = (($project_achieved/$project_total)*100);
        $project_r_c = ($project_r/30);

        $total_achievedMarks =($Final_r_c + $mid_r_c + $project_r_c);

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

        $id = DB::table('student_cgpa_t')->pluck('student_id');

        foreach($id as $r){
            if($student_id==$r){
                echo 'No value';
            }
            else {
                DB::table('student_cgpa_t')->insert([
                    'student_id' => $student_id,
                    'course_id' => $course_id,
                    // 'school_id' => $school_id,
                    'section_no' => $section_no,
                    // 'department_id' => $department_id,
                    'gpa' => $gpa,
                    // 'semester_id' => $semester_id,
                    'grade' => $grade
                    // 'degreeProgram_id' => $degreeProgram_id
                ]);
            }
        }




        $results =  DB::table('student_cgpa_t')
                    ->where('course_id', $course_id)
                    ->where('student_id', $student_id)
                    ->where('section_no', $section_no)
                    ->get();

        return view('assessment.calculate', compact('results'));

    }
}
