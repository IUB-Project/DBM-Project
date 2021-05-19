<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('key', 'value');

        $course = DB::table('course_t')->pluck("courseName","course_id");
        view()->share('courselist', $course);

        $degreeProgram = DB::table('degreeprogram_t')->pluck("degreeProgramName","degreeProgram_id");
        view()->share('degreeProgramlist', $degreeProgram);

        $department = DB::table('department_t')->pluck("departmentName","department_id");
        view()->share('departmentlist', $department);

        $colist = DB::table('co_t')->pluck("co_id");
        view()->share('colist', $colist);

        $semesterList = DB::table('semester_t')->get();
        view()->share('semesterList', $semesterList);

        $schoolList = DB::table('school_t')->pluck("schoolName","school_id");
        view()->share('schoolList', $schoolList);

        $employeelist = DB::table('employee_t')->get();
        view()->share('employeelist', $employeelist);

    }
}
