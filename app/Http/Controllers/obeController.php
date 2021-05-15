<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class obeController extends Controller
{
    public function view(Request $request)
    {

        $co1Achieved = DB::table('assessment_t')
            ->where('co_id', 'CO1')
            ->sum('achievedMark');

        $co1Total = DB::table('assessment_t')
            ->where('co_id', 'CO1')
            ->sum('maxMarks');

        $co1Results = (($co1Achieved / $co1Total) * 100);

        var_dump($co1Results);

        if ($co1Results >= 40)
            $co1F = 1;
        else
            $co1F = 0;

        var_dump($co1F);
    }
}
