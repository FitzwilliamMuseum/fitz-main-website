<?php

namespace Tests\Unit\Console;

use App\Console\Kernel;
use Illuminate\Console\Scheduling\Schedule;
use PHPUnit\Framework\TestCase;
use Mockery;
// Do not import SolrSearch directly, will mock as alias

class KernelTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
        // This forcefully cleans up Mockery's entire container,
        // ensuring no mocks from previous tests can interfere.
        if (Mockery::getContainer() != null) {
            Mockery::getContainer()->mockery_tearDown();
        }
      
    }
    
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testScheduleCallsSolrTasksWhenSolrEnabled()
    {
        $kernel = Mockery::mock(Kernel::class)->makePartial()->shouldAllowMockingProtectedMethods();
        $schedule = Mockery::mock(Schedule::class);

        // Inject checker to simulate Solr enabled
        $kernel->setSolrEnabledChecker(function () {
            return true;
        });
        $kernel->shouldReceive('solrTasks')->once()->with($schedule);

        $kernel->schedule($schedule);
    }

    public function testScheduleDoesNotCallSolrTasksWhenSolrDisabled()
    {
        $kernel = Mockery::mock(Kernel::class)->makePartial()->shouldAllowMockingProtectedMethods();
        $schedule = Mockery::mock(Schedule::class);

        // Inject checker to simulate Solr disabled
        $kernel->setSolrEnabledChecker(function () {
            return false;
        });
        $kernel->shouldNotReceive('solrTasks');

        $kernel->schedule($schedule);
    }
}
