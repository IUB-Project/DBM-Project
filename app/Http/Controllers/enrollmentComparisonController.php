<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class enrollmentComparisonController extends Controller
{
    public function view(Request $request)
    {


        $value = $request->all();

        if (empty($value['department_id_']) and empty($value['degreeProgram_id_'])) {


            $eCS = DB::table('enrollment_t')
                ->select(DB::raw('count(*) as  enrollment_count'))
                ->whereBetween('enrollmentDate', [$value['enrollmentDateStart'], $value['enrollmentDateEnd']])
                ->whereIn('school_id', $value['school_id_'])
                ->groupBy('school_id')
                ->pluck('enrollment_count');

            $v = json_decode(json_encode($eCS), true);
            $x = $value['school_id_'];
        } elseif (empty($value['school_id_']) and empty($value['degreeProgram_id_'])) {

            $eCS = DB::table('enrollment_t')
                ->select(DB::raw('count(*) as  enrollment_count'))
                ->whereBetween('enrollmentDate', [$value['enrollmentDateStart'], $value['enrollmentDateEnd']])
                ->whereIn('department_id', $value['department_id_'])
                ->groupBy('department_id')
                ->pluck('enrollment_count');

            $v = json_decode(json_encode($eCS), true);
            $x = $value['department_id_'];
        } elseif (empty($value['school_id_']) and empty($value['department_id_'])) {

            $eCS = DB::table('enrollment_t')
                ->select(DB::raw('count(*) as  enrollment_count'))
                ->whereBetween('enrollmentDate', [$value['enrollmentDateStart'], $value['enrollmentDateEnd']])
                ->whereIn('degreeProgram_id', $value['degreeProgram_id_'])
                ->groupBy('degreeProgram_id')
                ->pluck('enrollment_count');

            $v = json_decode(json_encode($eCS), true);
            $x = $value['degreeProgram_id_'];
        }



        return view('enrollment.compare', compact('v', 'x'));
    }
}
