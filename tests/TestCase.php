<?php

namespace BlimeyDev\Tests;

use \Orchestra\Testbench\TestCase as BaseTestCase;
use Orchestra\Testbench\Concerns\WithWorkbench; 

class TestCase extends BaseTestCase{
    use WithWorkbench;
    protected function getEnvironmentSetUp($app)
    {
        $app->setBasePath(__DIR__);
    }
}
