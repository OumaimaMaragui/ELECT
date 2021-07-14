<?php

namespace App\Console;
use App\Console\Commands\Notify;
use App\Jobs\Notif;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\Actualite::class,
        Commands\Mensuelle::class,
        Commands\Tranche::class,

           ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
      
        $schedule->command('actualite:send')->everyMinute(); 
        //$schedule->command('actualite:send')->daily();

        $schedule->command('mensualite:suggest')->everyMinute();
        //$schedule->command('mensualite:suggest')->monthly();

        $schedule->command('tranche:detect')->everyMinute();
        //$schedule->command('tranche:detect')->monthly();
        
       
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
