<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class coComparisonController extends Controller
{
    public function view(Request $request)
    {


        $value = $request->all();
        //var_dump($value);

        if (!empty($value['school_id_'])) {


            $co_r = DB::table('evaluation_t')
                ->select(DB::raw('count(*) as co_r'))
                ->whereIn('school_id', $value['school_id_'])
                ->where('co_achieved', 'YES')
                ->when(!empty($value['semester_id_']), function ($query) use ($value) {
                    return $query->where('semester_id', $value['semester_id_']);
                })
                ->groupBy('school_id')
                ->pluck('co_r');




            $v = json_decode(json_encode($co_r), true);
            $x = $value['school_id_'];
        } elseif (!empty($value['department_id_'])) {

            $co_r = DB::table('evaluation_t')
                ->select(DB::raw('count(*) as co_r'))
                ->whereIn('department_id', $value['department_id_'])
                ->where('co_achieved', 'YES')
                ->when(!empty($value['semester_id_']), function ($query) use ($value) {
                    return $query->where('semester_id', $value['semester_id_']);
                })
                ->groupBy('department_id')
                ->pluck('co_r');

            $v = json_decode(json_encode($co_r), true);
            $x = $value['department_id_'];
        } elseif (!empty($value['degreeProgram_id_'])) {

            $co_r = DB::table('evaluation_t')
                ->select(DB::raw('count(*) as co_r'))
                ->whereIn('degreeProgram_id', $value['degreeProgram_id_'])
                ->where('co_achieved', 'YES')
                ->when(!empty($value['semester_id_']), function ($query) use ($value) {
                    return $query->where('semester_id', $value['semester_id_']);
                })
                ->groupBy('degreeProgram_id')
                ->pluck('co_r');

            $v = json_decode(json_encode($co_r), true);
            $x = $value['degreeProgram_id_'];
        }
        elseif (!empty($value['course_id_'])) {

            $co_r = DB::table('evaluation_t')
                ->select(DB::raw('count(*) as co_r'))
                ->whereIn('course_id', $value['course_id_'])
                ->where('co_achieved', 'YES')
                ->when(!empty($value['semester_id_']), function ($query) use ($value) {
                    return $query->where('semester_id', $value['semester_id_']);
                })
                ->groupBy('course_id')
                ->pluck('co_r');

            $v = json_decode(json_encode($co_r), true);
            $x = $value['course_id_'];
        }
        // elseif (!empty($value['student_id'])) {

        //     $co_r = DB::table('evaluation_t')
        //         ->select(DB::raw('count(*) as co_r'))
        //         ->whereIn('instructor_id', $value['instructor_id_'])
        //         ->where('co_achieved', 'YES')
        //         ->when(!empty($value['semester_id_']), function ($query) use ($value) {
        //             return $query->where('semester_id', $value['semester_id_']);
        //         })
        //         ->groupBy('instructor_id')
        //         ->pluck('co_r');

        //     $v = json_decode(json_encode($co_r), true);
        //     $x= DB::table('employee_t')->where('employee_id', $value['instructor_id_'])->pluck('fName');

        // }



        return view('CO_PLO.compare', compact('v', 'x'));
    }
}
