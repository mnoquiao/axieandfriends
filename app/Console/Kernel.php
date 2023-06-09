<?php

namespace App\Console;

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
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        // run this task every hour
        // create a snapshot of total raws of most important tables
        $schedule->command('cron:hourlysnap')->everyMinute();//->hourly();

        // run this task daily at 1:00 and 4:00
        // this will delete scholar daily slp record that is above 1 month
        $schedule->command('cron:deldailyslp')->everyMinute();//->twiceDaily(1,3);

        // run this task daily at 1:00 and 4:00
        // this will delete scholar daily slp record that is above 1 month
        $schedule->command('cron:delrawlogs')->everyMinute();//->twiceDaily(2,4);

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
