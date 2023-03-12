<?php

namespace App\Console;

use App\Jobs\SendEmailJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->job(new SendEmailJob())
        ->dailyAt('8:00')
        ;
        $schedule->command('SendEmailToUsers')
        ->dailyAt('8:00')
        ;


    }
    // protected $commands = [
    //     Commands\SendEmailToUsers::class,
    // ];
    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');

        $this->commands([
            \App\Console\Commands\SendEmailToUsers::class,
        ]);
    }



}
