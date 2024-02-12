<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        
         // Schedule the task to run daily at midnight
    $schedule->call(function () {
        // Delete PDF files older than 7 days
        $pdfPath = storage_path('app/pdf_reports/');
        $sevenDaysAgo = now()->subDays(7);
        $filesToDelete = \File::glob($pdfPath . '*.pdf');

        foreach ($filesToDelete as $file) {
            if (\File::lastModified($file) < $sevenDaysAgo->timestamp) {
                \File::delete($file);
            }
        }
    })->dailyAt('00:00');
        // $schedule->command('inspire')->hourly();
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
