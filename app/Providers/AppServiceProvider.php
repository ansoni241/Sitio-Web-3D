<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

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
        //modificado para quitar la proteccion contra asignacion masiva modelos eloquent
        Model::unguard();

        Blade::directive('charts', function () {
            return '<?php foreach (\App\Models\Chart::where("online_sino", 1)->get() as $chart): ?>';
        });

        Blade::directive('endcharts', function () {
            return '<?php endforeach; ?>';
        });
        Blade::directive('redsocial', function () {
            return '<?php foreach (\App\Models\Redsocial::all() as $redsocial): ?>';
        });

        Blade::directive('endredsocial', function () {
            return '<?php endforeach; ?>';
        });

    }
}
