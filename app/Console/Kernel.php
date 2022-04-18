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
     * @param Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        # Import to search
        $schedule->call('App\Http\Controllers\solrimportController@staff')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrimportController@affilates')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrimportController@stubs')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrimportController@news')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrimportController@directors')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrimportController@researchprojects')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrimportController@galleries')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrimportController@lookthinkdo')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrimportController@collections')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrimportController@departments')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrimportController@pressroom')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrimportController@themes')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrimportController@pharospages')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrimportController@highlights')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrimportController@floor')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrimportController@governance')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrimportController@learningfiles')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrimportController@exhibitions')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrimportController@audio')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrimportController@sessions')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrimportController@shopify')->cron('5 */12 * * *');
        $schedule->call('App\Http\Controllers\solrimportController@podcasts')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrimportController@podcastseries')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrimportController@mindseye')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrimportController@vacancies')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrimportController@resources')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\instagramController@instagram')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\twitterController@twitter')->cron('0 */5 * * *');
        # Import Jekyll to solr
        $schedule->call('App\Http\Controllers\jekyllController@import')->cron('0 */5 * * *');
        # Import WordPress to solr
        $schedule->call('App\Http\Controllers\wordpressController@import')->cron('0 */9 * * *');
        # Clear caches
        $schedule->call('App\Http\Controllers\Controller@clearCache')->cron('6 */12 * * */1');
        # Clear sessions/shopify
        $schedule->call('App\Http\Controllers\solrimportController@shopifyRefresh')->cron('1 */12 * * */3');
        $schedule->call('App\Http\Controllers\solrimportController@sessionsRefresh')->cron('1 */12 * * */3');
        # Sitemap generation
        $schedule->command('sitemap:generate')->daily();
        # Long form
        $schedule->call('App\Http\Controllers\solrimportController@longform')->weekly();
        # Spoliation
        $schedule->call('App\Http\Controllers\solrimportController@spoliation')->daily();

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
