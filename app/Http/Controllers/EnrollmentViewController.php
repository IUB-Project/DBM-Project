<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EnrollmentViewController extends Controller
{
    public function view(Request $request)
    {

        $enrollmentDateStart = $request->input('enrollmentDateStart');
        $enrollmentDateEnd = $request->input('enrollmentDateEnd');
        $degreeProgram_id = $request->input('degreeProgram_id');

        if (empty($enrollmentDateStart)) {
            $enrollmentView = DB::table('enrollment_t')
                ->where('degreeProgram_id', $degreeProgram_id)
                ->get();
        } elseif (empty($degreeProgram_id)) {
            $enrollmentView = DB::table('enrollment_t')
                ->whereBetween('enrollmentDate', [$enrollmentDateStart, $enrollmentDateEnd])
                ->get();
        } else {
            $enrollmentView = DB::table('enrollment_t')
                ->whereBetween('enrollmentDate', [$enrollmentDateStart, $enrollmentDateEnd])
                ->where('degreeProgram_id', $degreeProgram_id)
                ->get();
        }


        $enrollmentViewCount = $enrollmentView->count();
        return view('enrollment.view', compact('enrollmentViewCount'));
    }
}
