<?php

namespace App\Console;

use App\Models\SolrSearch;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Optional checker for Solr enabled state (for testing).
     * @var callable|null
     */
    protected $solrEnabledChecker = null;

    /**
     * Set a checker callback for Solr enabled state (for testing).
     * @param callable $checker
     */
    public function setSolrEnabledChecker(callable $checker)
    {
        $this->solrEnabledChecker = $checker;
    }
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
        $isSolrEnabled = $this->solrEnabledChecker
            ? call_user_func($this->solrEnabledChecker)
            : SolrSearch::isSolrEnabled();

        if ($isSolrEnabled) {
            $this->solrTasks($schedule);
        }
    }

    /**
     * Scheduled console tasks to run for Solr
     *
     * @param Schedule $schedule
     * @return void
     */
    public function solrTasks(Schedule $schedule)
    {
        # Import to search
        $schedule->call('App\Http\Controllers\solrImportController@staff')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrImportController@affiliates')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrImportController@stubs')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrImportController@news')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrImportController@directors')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrImportController@researchProjects')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrImportController@galleries')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrImportController@lookThinkDo')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrImportController@collections')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrImportController@departments')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrImportController@pressroom')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrImportController@pharosPages')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrImportController@highlights')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrImportController@floor')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrImportController@governance')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrImportController@learningFiles')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrImportController@exhibitions')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrImportController@audio')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrImportController@sessions')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrImportController@shopify')->cron('5 */12 * * *');
        $schedule->call('App\Http\Controllers\solrImportController@podcasts')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrImportController@podcastSeries')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrImportController@mindseye')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrImportController@vacancies')->cron('0 */5 * * *');
        $schedule->call('App\Http\Controllers\solrImportController@resources')->cron('0 */5 * * *');
//        $schedule->call('App\Http\Controllers\instagramController@instagram')->cron('0 */5 * * *');
//        $schedule->call('App\Http\Controllers\twitterController@twitter')->cron('0 */5 * * *');
        # Import Jekyll to solr
        $schedule->call('App\Http\Controllers\jekyllController@import')->cron('0 */5 * * *');
        # Import WordPress to solr
        $schedule->call('App\Http\Controllers\wordpressController@import')->cron('0 */9 * * *');
        # Clear caches
        $schedule->call('App\Http\Controllers\Controller@clearCache')->cron('6 */12 * * */1');
        # Clear sessions/shopify
        $schedule->call('App\Http\Controllers\solrImportController@shopifyRefresh')->cron('1 */12 * * */3');
        $schedule->call('App\Http\Controllers\solrImportController@sessionsRefresh')->cron('1 */12 * * */3');
        # Clear staff profiles
        $schedule->call('App\Http\Controllers\solrImportController@staffRefresh')->cron('0 2 * * *');
        # Sitemap generation
        $schedule->command('sitemap:generate')->daily();
        # Long form
        $schedule->call('App\Http\Controllers\solrImportController@longForm')->weekly();
        # Spoliation
        $schedule->call('App\Http\Controllers\solrImportController@spoliation')->daily();
        # True to nature
        $schedule->call('App\Http\Controllers\solrImportController@ttnLabels')->weekly();
        $schedule->call('App\Http\Controllers\solrImportController@ttnArtists')->weekly();
        $schedule->call('App\Http\Controllers\solrImportController@viewPoints')->weekly();
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
