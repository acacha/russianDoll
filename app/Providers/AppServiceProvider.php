<?php

namespace App\Providers;

use App\Matriushka;
use Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('cache', function ($expression) {
            return "<?php if ( Matriushka::setUp($expression)) { ?>";
        });

        Blade::directive('endcache', function ($expression) {
            return "<?php } echo Matriushka::tearDown() ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
