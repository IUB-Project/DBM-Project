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

        /* Input Section */
        $enrollmentDateStart = $request->input('enrollmentDateStart');
        $enrollmentDateEnd = $request->input('enrollmentDateEnd');
        $degreeProgram_id = $request->input('degreeProgram_id');
        $department_id = $request->input('department_id');
        $school_id = $request->input('school_id');
        $semester_id = $request->input('semester_id');

        /* Variables: eCS1-5 */

        if (empty($department_id) and empty($degreeProgram_id)){

                $eCS1 = DB::table('enrollment_t')
                ->where('school_id', $school_id)
                ->where('semester_id', 1)
                ->count();

                $eCS2 = DB::table('enrollment_t')
                ->where('school_id', $school_id)
                ->where('semester_id', 2)
                ->count();

                $eCS3 = DB::table('enrollment_t')
                ->where('school_id', $school_id)
                ->where('semester_id', 3)
                ->count();

                $eCS4 = DB::table('enrollment_t')
                ->where('school_id', $school_id)
                ->where('semester_id', 4)
                ->count();

                $eCS5 = DB::table('enrollment_t')
                ->where('school_id', $school_id)
                ->where('semester_id', 5)
                ->count();


            }

            //var_dump($eCS1);

            return view('enrollment.compare', compact('eCS1','eCS2','eCS3','eCS4','eCS5'));

    }
}
