<?php

namespace App\Console\Commands;

use App\Http\Controllers\solrImportController;
use Illuminate\Console\Command;

class ImportAllSolrData extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'solr:import-all';

    /**
     * The console command description.
     * @var string
     */
    protected $description = 'Runs all Solr import processes in one go';

    /**
     * Execute the console command.
     * @return int
     */
    public function handle(solrImportController $solrImportController)
    {
        // Use a list of methods to iterate through
        $methodsToRun = [
            'staff', 'affiliates', 'stubs', 'news', 'directors',
            'researchProjects', 'galleries', 'lookThinkDo', 'collections',
            'departments', 'pressroom', 'pharosPages', 'highlights', 'floor',
            'governance', 'learningFiles', 'exhibitions', 'audio', 'sessions',
            'shopify', 'podcasts', 'podcastSeries', 'mindseye', 'vacancies',
            'resources'
        ];

        $this->info('Starting all Solr import processes...');

        foreach ($methodsToRun as $method) {
            $this->comment("Importing {$method}...");
            $solrImportController->$method();
            $this->info("Successfully imported {$method}!");
        }

        $this->info('All Solr imports completed successfully.');

        return Command::SUCCESS;
    }
}