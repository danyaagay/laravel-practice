<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        Validator::extend('uniqueLecture', function ($attribute, $value, $parameters, $validator) {
            $count = DB::table('plans')->where('lecture_id', $value)
                                ->where('class_id', $parameters[0])
                                ->count();

            return $count === 0;
        });
    }
}
