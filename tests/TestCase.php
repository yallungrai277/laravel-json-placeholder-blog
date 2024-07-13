<?php

namespace JsonRai277\LaravelJsonPlaceholder\Tests;

use JsonRai277\LaravelJsonPlaceholder\LaravelJsonPlaceholderServiceProvider;
use Orchestra\Testbench\TestCase as TestbenchTestCase;

class TestCase extends TestbenchTestCase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @param Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [LaravelJsonPlaceholderServiceProvider::class];
    }
}
