<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Laravel\BrowserKitTesting\TestCase as BaseTestCase;
use Tests\CreatesApplication;
use Tests\CreatesUsers;
use Tests\HttpAssertions;

class BrowserKitTestCase extends BaseTestCase
{
    use CreatesApplication;
    use CreatesUsers;
    use HttpAssertions;

    public string $baseUrl = 'http://localhost';

    protected function setUpTraits(): array
    {
        return parent::setUpTraits();
    }

    protected function dispatch($job)
    {
        return $job->handle();
    }
}
