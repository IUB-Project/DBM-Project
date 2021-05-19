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
                ->groupBy('school_id')
                ->pluck('avg_gpa');


            $v = json_decode(json_encode($avg_r), true);
            $x = $value['school_id_'];
        } elseif (empty($value['school_id_']) and empty($value['degreeProgram_id_'])) {

            $avg_r = DB::table('evaluation_t')
                ->select(DB::raw('round(AVG(gpa),2) as avg_gpa'))
                ->whereIn('department_id', $value['department_id_'])
                ->groupBy('department_id')
                ->pluck('avg_gpa');

            $v = json_decode(json_encode($avg_r), true);
            $x = $value['department_id_'];
        } elseif (empty($value['school_id_']) and empty($value['department_id_'])) {

            $avg_r = DB::table('evaluation_t')
                ->select(DB::raw('round(AVG(gpa),2) as avg_gpa'))
                ->whereIn('degreeProgram_id', $value['degreeProgram_id_'])
                ->groupBy('degreeProgram_id')
                ->pluck('avg_gpa');

            $v = json_decode(json_encode($avg_r), true);
            $x = $value['degreeProgram_id_'];
        }



        return view('assessment.compare', compact('v', 'x'));
    }
}
