<?php

namespace App\Console;

use App\Console\Commands\SendReminderEmail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\MailCommand;
use App\Console\Commands\OrderCommand;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        MailCommand::class,
        OrderCommand::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        # Send statistic to all Admin
        $schedule->command('mail:send')
            ->withoutOverlapping()
            ->lastDayOfMonth('8:00')
            ->timezone(config('app.timezone'));
        
        # Delete rejected orders at 23:59 on the last day of the month
        $schedule->command('order:delete')
        ->withoutOverlapping()
        ->lastDayOfMonth('23:59')
        ->timezone(config('app.timezone'));
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
