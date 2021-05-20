<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class assessmentComparisonController extends Controller
{
    public function view(Request $request)
    {


        $value = $request->all();
        //var_dump($value);

        if (!empty($value['school_id_'])) {


            $avg_r = DB::table('evaluation_t')
                ->select(DB::raw('round(AVG(gpa),2) as avg_gpa'))
                ->whereIn('school_id', $value['school_id_'])
                ->when(!empty($value['semester_id_']), function ($query) use ($value) {
                    return $query->where('semester_id', $value['semester_id_']);
                })
                ->groupBy('school_id')
                ->pluck('avg_gpa');


            $v = json_decode(json_encode($avg_r), true);
            $x = $value['school_id_'];
        } elseif (!empty($value['department_id_'])) {

            $avg_r = DB::table('evaluation_t')
                ->select(DB::raw('round(AVG(gpa),2) as avg_gpa'))
                ->whereIn('department_id', $value['department_id_'])
                ->when(!empty($value['semester_id_']), function ($query) use ($value) {
                    return $query->where('semester_id', $value['semester_id_']);
                })
                ->groupBy('department_id')
                ->pluck('avg_gpa');

            $v = json_decode(json_encode($avg_r), true);
            $x = $value['department_id_'];
        } elseif (!empty($value['degreeProgram_id_'])) {

            $avg_r = DB::table('evaluation_t')
                ->select(DB::raw('round(AVG(gpa),2) as avg_gpa'))
                ->whereIn('degreeProgram_id', $value['degreeProgram_id_'])
                ->when(!empty($value['semester_id_']), function ($query) use ($value) {
                    return $query->where('semester_id', $value['semester_id_']);
                })
                ->groupBy('degreeProgram_id')
                ->pluck('avg_gpa');

            $v = json_decode(json_encode($avg_r), true);
            $x = $value['degreeProgram_id_'];
        }
        elseif (!empty($value['course_id_'])) {

            $avg_r = DB::table('evaluation_t')
                ->select(DB::raw('round(AVG(gpa),2) as avg_gpa'))
                ->whereIn('course_id', $value['course_id_'])
                ->when(!empty($value['semester_id_']), function ($query) use ($value) {
                    return $query->where('semester_id', $value['semester_id_']);
                })
                ->groupBy('course_id')
                ->pluck('avg_gpa');

            $v = json_decode(json_encode($avg_r), true);
            $x = $value['course_id_'];
        }
        elseif (!empty($value['instructor_id_'])) {

            $avg_r = DB::table('evaluation_t')
                ->select(DB::raw('round(AVG(gpa),2) as avg_gpa'))
                ->whereIn('instructor_id', $value['instructor_id_'])
                ->when(!empty($value['semester_id_']), function ($query) use ($value) {
                    return $query->where('semester_id', $value['semester_id_']);
                })
                ->groupBy('instructor_id')
                ->pluck('avg_gpa');

            $v = json_decode(json_encode($avg_r), true);
            $x= DB::table('employee_t')->where('employee_id', $value['instructor_id_'])->pluck('fName');

        }



        return view('assessment.compare', compact('v', 'x'));
    }
}
