<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class coViewController extends Controller
{
    public function view(Request $request)
    {


        $value = $request->all();
        //var_dump($value);

        if (!empty($value['course_id_'])) {
            $CO1_SCORE = DB::table('evaluation_t')
                ->where('course_id', $value['course_id_'])
                ->where('co1_achieved', 'YES')
                ->when(!empty($value['semester_id_']), function ($query) use ($value) {
                    return $query->where('semester_id', $value['semester_id_']);
                })
                ->when(!empty($value['section_no']), function ($query) use ($value) {
                    return $query->where('section_no', $value['section_no']);
                })
                ->count();


            $CO1_ATTEMPTS = DB::table('evaluation_t')
                ->where('course_id', $value['course_id_'])
                ->when(!empty($value['semester_id_']), function ($query) use ($value) {
                    return $query->where('semester_id', $value['semester_id_']);
                })
                ->when(!empty($value['section_no']), function ($query) use ($value) {
                    return $query->where('section_no', $value['section_no']);
                })
                ->count();

            if (!empty($CO1_ATTEMPTS)){
                $CO1_SUCCESS = (($CO1_SCORE / $CO1_ATTEMPTS) * 100);
            $CO1_FAILED = (100 - $CO1_SUCCESS);

            }


            $CO2_SCORE = DB::table('evaluation_t')
                ->where('course_id', $value['course_id_'])
                ->where('co2_achieved', 'YES')
                ->when(!empty($value['semester_id_']), function ($query) use ($value) {
                    return $query->where('semester_id', $value['semester_id_']);
                })
                ->when(!empty($value['section_no']), function ($query) use ($value) {
                    return $query->where('section_no', $value['section_no']);
                })
                ->count();

            $CO2_ATTEMPTS = DB::table('evaluation_t')
                ->where('course_id', $value['course_id_'])
                ->when(!empty($value['semester_id_']), function ($query) use ($value) {
                    return $query->where('semester_id', $value['semester_id_']);
                })
                ->when(!empty($value['section_no']), function ($query) use ($value) {
                    return $query->where('section_no', $value['section_no']);
                })
                ->count();

                if (!empty($CO2_ATTEMPTS)){
            $CO2_SUCCESS = (($CO2_SCORE / $CO2_ATTEMPTS) * 100);
            $CO2_FAILED = (100 - $CO2_SUCCESS);}

            $CO3_SCORE = DB::table('evaluation_t')
                ->where('course_id', $value['course_id_'])
                ->where('co3_achieved', 'YES')
                ->when(!empty($value['semester_id_']), function ($query) use ($value) {
                    return $query->where('semester_id', $value['semester_id_']);
                })
                ->when(!empty($value['section_no']), function ($query) use ($value) {
                    return $query->where('section_no', $value['section_no']);
                })
                ->count();

            $CO3_ATTEMPTS = DB::table('evaluation_t')
                ->where('course_id', $value['course_id_'])
                ->when(!empty($value['semester_id_']), function ($query) use ($value) {
                    return $query->where('semester_id', $value['semester_id_']);
                })
                ->when(!empty($value['section_no_']), function ($query) use ($value) {
                    return $query->where('section_no', $value['section_no']);
                })
                ->count();
                if (!empty($CO3_ATTEMPTS)){
            $CO3_SUCCESS = (($CO3_SCORE / $CO3_ATTEMPTS) * 100);
            $CO3_FAILED = (100 - $CO3_SUCCESS);}

            $CO4_SCORE = DB::table('evaluation_t')
                ->where('course_id', $value['course_id_'])
                ->where('co4_achieved', 'YES')
                ->when(!empty($value['semester_id_']), function ($query) use ($value) {
                    return $query->where('semester_id', $value['semester_id_']);
                })
                ->when(!empty($value['section_no']), function ($query) use ($value) {
                    return $query->where('section_no', $value['section_no']);
                })
                ->count();

            $CO4_ATTEMPTS = DB::table('evaluation_t')
                ->where('course_id', $value['course_id_'])
                ->when(!empty($value['semester_id_']), function ($query) use ($value) {
                    return $query->where('semester_id', $value['semester_id_']);
                })
                ->when(!empty($value['section_no']), function ($query) use ($value) {
                    return $query->where('section_no', $value['section_no']);
                })
                ->count();
                if (!empty($CO4_ATTEMPTS)){
            $CO4_SUCCESS = (($CO4_SCORE / $CO4_ATTEMPTS) * 100);
            $CO4_FAILED = (100 - $CO4_SUCCESS);}
        }



        // var_dump($CO_P);



        // if (!empty($value['school_id_'])) {


        //     $co = DB::table('evaluation_t')
        //         ->select(DB::raw('count(*) as co_h'))
        //         ->whereIn('school_id', $value['school_id_'])
        //         ->when(!empty($value['semester_id_']), function ($query) use ($value) {
        //             return $query->where('semester_id', $value['semester_id_']);
        //         })
        //         ->groupBy('school_id')
        //         ->pluck('avg_gpa');


        //     $v = json_decode(json_encode($avg_r), true);
        //     $x = $value['school_id_'];
        // } elseif (!empty($value['department_id_'])) {

        //     $avg_r = DB::table('evaluation_t')
        //         ->select(DB::raw('round(AVG(gpa),2) as avg_gpa'))
        //         ->whereIn('department_id', $value['department_id_'])
        //         ->when(!empty($value['semester_id_']), function ($query) use ($value) {
        //             return $query->where('semester_id', $value['semester_id_']);
        //         })
        //         ->groupBy('department_id')
        //         ->pluck('avg_gpa');

        //     $v = json_decode(json_encode($avg_r), true);
        //     $x = $value['department_id_'];
        // } elseif (!empty($value['degreeProgram_id_'])) {

        //     $avg_r = DB::table('evaluation_t')
        //         ->select(DB::raw('round(AVG(gpa),2) as avg_gpa'))
        //         ->whereIn('degreeProgram_id', $value['degreeProgram_id_'])
        //         ->when(!empty($value['semester_id_']), function ($query) use ($value) {
        //             return $query->where('semester_id', $value['semester_id_']);
        //         })
        //         ->groupBy('degreeProgram_id')
        //         ->pluck('avg_gpa');

        //     $v = json_decode(json_encode($avg_r), true);
        //     $x = $value['degreeProgram_id_'];
        // }
        // elseif (!empty($value['course_id_'])) {

        //     $avg_r = DB::table('evaluation_t')
        //         ->select(DB::raw('round(AVG(gpa),2) as avg_gpa'))
        //         ->whereIn('course_id', $value['course_id_'])
        //         ->when(!empty($value['semester_id_']), function ($query) use ($value) {
        //             return $query->where('semester_id', $value['semester_id_']);
        //         })
        //         ->groupBy('course_id')
        //         ->pluck('avg_gpa');

        //     $v = json_decode(json_encode($avg_r), true);
        //     $x = $value['course_id_'];
        // }
        // elseif (!empty($value['instructor_id_'])) {

        //     $avg_r = DB::table('evaluation_t')
        //         ->select(DB::raw('round(AVG(gpa),2) as avg_gpa'))
        //         ->whereIn('instructor_id', $value['instructor_id_'])
        //         ->when(!empty($value['semester_id_']), function ($query) use ($value) {
        //             return $query->where('semester_id', $value['semester_id_']);
        //         })
        //         ->groupBy('instructor_id')
        //         ->pluck('avg_gpa');

        //     $v = json_decode(json_encode($avg_r), true);
        //     $x= DB::table('employee_t')->where('employee_id', $value['instructor_id_'])->pluck('fName');

        // }



        return view('CO_PLO.view', compact('CO1_SCORE', 'CO1_ATTEMPTS','CO2_SCORE', 'CO2_ATTEMPTS','CO3_SCORE', 'CO3_ATTEMPTS','CO4_SCORE', 'CO4_ATTEMPTS',
        'CO1_SUCCESS', 'CO1_FAILED', 'CO2_SUCCESS', 'CO2_FAILED', 'CO3_SUCCESS', 'CO3_FAILED', 'CO4_SUCCESS', 'CO4_FAILED'));
    }
}
