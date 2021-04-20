<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Http\Controllers;
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
        $schedule->call('App\Http\Controllers\searchController@staff')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\searchController@stubs')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\searchController@news')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\searchController@directors')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\searchController@researchprojects')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\searchController@galleries')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\searchController@lookthinkdo')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\searchController@collections')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\searchController@departments')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\searchController@pressroom')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\searchController@themes')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\searchController@pharospages')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\searchController@highlights')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\searchController@floor')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\searchController@governance')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\searchController@learningfiles')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\searchController@exhibitions')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\searchController@audio')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\searchController@sessions')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\searchController@shopifyRefresh')->cron('1 */12 * * */1');
        $schedule->call('App\Http\Controllers\searchController@shopify')->cron('5 */12 * * *');
        $schedule->call('App\Http\Controllers\Controller@clearCache')->cron('6 */12 * * */1');
        $schedule->call('App\Http\Controllers\searchController@podcasts')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\searchController@podcastseries')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\searchController@mindseye')->cron('0 */5 * * *');

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
