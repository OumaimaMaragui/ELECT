<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use ConsoleTVs\Charts\Registrar as Charts;
use DB;
use Config;
use Carbon\Carbon;


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

        public function boot(Charts $charts)
        {
            $charts->register([
                \App\Charts\AnnuelleChart::class,
                \App\Charts\MensuelleChart::class,
                \App\Charts\HebdoChart::class,
                \App\Charts\QuotidienChart::class
            ]);
        }  
      }

