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
        $course_id = $request->input('course_id');
        $student_id = $request->input('student_id');
        $section_no = $request->input('section_no');
        $semester_id = $request->input('semester_id');

        /* Analysis Algorithm */

        $Mid_achieved = DB::table('assessment_t')
        ->where('course_id', $course_id)
        ->where('student_id', $student_id)
        ->where('section_no', $section_no)
        ->where('semester_id', $semester_id)
        ->where('assessmentType', 'Mid')
        ->sum('achievedMark');

        $Mid_total = DB::table('assessment_t')
        ->where('course_id', $course_id)
        ->where('student_id', $student_id)
        ->where('section_no', $section_no)
        ->where('semester_id', $semester_id)
        ->where('assessmentType', 'Mid')
        ->sum('maxMarks');

        $mid_r = (($Mid_achieved/$Mid_total)*100);
        $mid_r_c = (($mid_r/100)*30);

        $Final_achieved = DB::table('assessment_t')
        ->where('course_id', $course_id)
        ->where('student_id', $student_id)
        ->where('section_no', $section_no)
        ->where('semester_id', $semester_id)
        ->where('assessmentType', 'Final')
        ->sum('achievedMark');

        $Final_total = DB::table('assessment_t')
        ->where('course_id', $course_id)
        ->where('student_id', $student_id)
        ->where('section_no', $section_no)
        ->where('semester_id', $semester_id)
        ->where('assessmentType', 'Final')
        ->sum('maxMarks');

        $Final_r = (($Final_achieved/$Final_total)*100);
        $Final_r_c = (($Final_r/100)*40);

        $project_a1 = DB::table('assessment_t')
        ->where('course_id', $course_id)
        ->where('student_id', $student_id)
        ->where('section_no', $section_no)
        ->where('semester_id', $semester_id)
        ->where('assessmentType', 'Assignment')
        ->sum('achievedMark');

        $project_t1 = DB::table('assessment_t')
        ->where('course_id', $course_id)
        ->where('student_id', $student_id)
        ->where('section_no', $section_no)
        ->where('semester_id', $semester_id)
        ->where('assessmentType', 'Assignment')
        ->sum('maxMarks');
        $project_a2 = DB::table('assessment_t')
        ->where('course_id', $course_id)
        ->where('student_id', $student_id)
        ->where('section_no', $section_no)
        ->where('semester_id', $semester_id)
        ->where('assessmentType', 'Project')
        ->sum('achievedMark');

        $project_t2 = DB::table('assessment_t')
        ->where('course_id', $course_id)
        ->where('student_id', $student_id)
        ->where('section_no', $section_no)
        ->where('semester_id', $semester_id)
        ->where('assessmentType', 'Project')
        ->sum('maxMarks');

        $project_a3 = DB::table('assessment_t')
        ->where('course_id', $course_id)
        ->where('student_id', $student_id)
        ->where('section_no', $section_no)
        ->where('semester_id', $semester_id)
        ->where('assessmentType', 'Quiz')
        ->sum('achievedMark');

        $project_t3 = DB::table('assessment_t')
        ->where('course_id', $course_id)
        ->where('student_id', $student_id)
        ->where('section_no', $section_no)
        ->where('semester_id', $semester_id)
        ->where('assessmentType', 'Quiz')
        ->sum('maxMarks');

        $project_a4 = DB::table('assessment_t')
        ->where('course_id', $course_id)
        ->where('student_id', $student_id)
        ->where('section_no', $section_no)
        ->where('semester_id', $semester_id)
        ->where('assessmentType', 'Presentation')
        ->sum('achievedMark');

        $project_t4 = DB::table('assessment_t')
        ->where('course_id', $course_id)
        ->where('student_id', $student_id)
        ->where('section_no', $section_no)
        ->where('semester_id', $semester_id)
        ->where('assessmentType', 'Presentation')
        ->sum('maxMarks');

        $project_achieved = $project_a1+$project_a2+$project_a3+$project_a4;
        $project_total= $project_t1+$project_t2+$project_t3+$project_t4;

        $project_r = (($project_achieved/$project_total)*100);
        $project_r_c = (($project_r/100)*30);

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
        ->where('co_id', 'CO1')
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

        if(!empty($CO1_ACH)){
            $CO_R1 = (($CO1_ACH/$CO1_MAX)*100);

        if($CO_R1 >= 40){
            $CO1R = 'YES';
            $PO2 = 'YES';
        }
        else{
            $CO1R = 'NO';
            $PO2 = 'NO';
        }
        }
        else{
            $CO1R = 'NO';
            $PO2 = 'NO';
        }

        if(!empty($CO2_ACH)){
            $CO_R2 = (($CO2_ACH/$CO2_MAX)*100);
            if($CO_R2 >= 40){
                $CO2R = 'YES';
                $PO3 = 'YES';
            }
            else{
                $CO2R = 'NO';
                $PO3 = 'NO';
            }
        }
        else{
            $CO2R = 'NO';
            $PO3 = 'NO';
        }

        if(!empty($CO3_ACH)){
            $CO_R3 = (($CO3_ACH/$CO3_MAX)*100);
            if($CO_R3 >= 40){
                $CO3R = 'YES';
                $PO4 = 'YES';
            }
            else{
                $CO3R = 'NO';
                $PO4 = 'NO';
            }
        }
        else{
            $CO3R = 'NO';
            $PO4 = 'NO';
        }

        if(!empty($CO4_ACH)){
            $CO_R4 = (($CO4_ACH/$CO4_MAX)*100);
            if($CO_R4 >= 40){
                $CO4R = 'YES';
                $PO6 = 'YES';
            }

            else{
                $CO4R = 'NO';
                $PO6 = 'NO';
            }
        }
        else{
            $CO4R = 'NO';
            $PO6 = 'NO';
        }

        $CO_ACH = $CO1_ACH + $CO2_ACH + $CO3_ACH + $CO4_ACH;
        $CO_MAX = $CO1_MAX + $CO2_MAX + $CO3_MAX + $CO4_MAX;

        $CO = (($CO_ACH/$CO_MAX)*100);
        if($CO >= 40){
            $CO_R = 'YES';
        }
        else{
            $CO_R = 'NO';
        }


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
        $instructor_id1 =DB::table('section_t')->where('course_id', $course_id)->where('section_no', $section_no)->where('semester_id', $semester_id)->pluck('instructor_id');
        $instructor_id2 = json_decode($instructor_id1);
        $instructor_id =implode("",$instructor_id2);


        if(in_array($student_id, $id)){
        }
            else{
                DB::table('evaluation_t')->insert([
                    'student_id' => $student_id,
                    'course_id' => $course_id,
                    'school_id' => $school_id,
                    'co1_achieved' => $CO1R,
                    'co2_achieved' => $CO2R,
                    'co3_achieved' => $CO3R,
                    'co4_achieved' => $CO4R,
                    'po2_achieved' => $PO2,
                    'po3_achieved' => $PO3,
                    'po4_achieved' => $PO4,
                    'po6_achieved' => $PO6,
                    'co_achieved' => $CO_R,
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
