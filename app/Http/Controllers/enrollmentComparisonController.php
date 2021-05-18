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
        // $enrollmentDateStart = $request->input('enrollmentDateStart');
        // $enrollmentDateEnd = $request->input('enrollmentDateEnd');
        // $degreeProgram_id = $request->input('degreeProgram_id');
        // $department_id = $request->input('department_id');
        $value = $request->all();
        $school_id = $value['school_id_'];
        //var_dump($school_id);



        /* Variables: eCS1-5 */

        if (empty($department_id) and empty($degreeProgram_id)){


                    $eCS = DB::table('enrollment_t')
                    ->select(DB::raw('count(*) as  disk_count'))
                    ->whereIn('school_id', $school_id)
                    ->where('semester_id', 1)
                    ->groupBy('school_id')
                    ->pluck('disk_count');

                    $v = json_decode(json_encode($eCS), true);
                    $x = $school_id;
                }

            elseif (empty($school_id) and empty($degreeProgram_id)){

                $eCS1 = DB::table('enrollment_t')
                ->where('department_id', $department_id)
                ->where('semester_id', 1)
                ->count();

                $eCS2 = DB::table('enrollment_t')
                ->where('department_id', $department_id)
                ->where('semester_id', 2)
                ->count();

                $eCS3 = DB::table('enrollment_t')
                ->where('department_id', $department_id)
                ->where('semester_id', 3)
                ->count();

                $eCS4 = DB::table('enrollment_t')
                ->where('department_id', $department_id)
                ->where('semester_id', 4)
                ->count();

                $eCS5 = DB::table('enrollment_t')
                ->where('department_id', $department_id)
                ->where('semester_id', 5)
                ->count();


            }
            elseif (empty($school_id) and empty($department_id)){

                $eCS1 = DB::table('enrollment_t')
                ->where('degreeProgram_id', $degreeProgram_id)
                ->where('semester_id', 1)
                ->count();

                $eCS2 = DB::table('enrollment_t')
                ->where('degreeProgram_id', $degreeProgram_id)
                ->where('semester_id', 2)
                ->count();

                $eCS3 = DB::table('enrollment_t')
                ->where('degreeProgram_id', $degreeProgram_id)
                ->where('semester_id', 3)
                ->count();

                $eCS4 = DB::table('enrollment_t')
                ->where('degreeProgram_id', $degreeProgram_id)
                ->where('semester_id', 4)
                ->count();

                $eCS5 = DB::table('enrollment_t')
                ->where('degreeProgram_id', $degreeProgram_id)
                ->where('semester_id', 5)
                ->count();


            }


            return view('enrollment.compare', compact('v', 'x', 'school_id'));

    }
}
