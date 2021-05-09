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

    }
}
