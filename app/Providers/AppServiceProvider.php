<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
=======
use Carbon\Carbon;
>>>>>>> 87741116a1b3f5aedca64f3f527cf8212022e055

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
<<<<<<< HEAD
        //
=======
        config(['app.locale' => 'id']);
Carbon::setLocale('id');
date_default_timezone_set('Asia/Jakarta');
>>>>>>> 87741116a1b3f5aedca64f3f527cf8212022e055
    }
}
