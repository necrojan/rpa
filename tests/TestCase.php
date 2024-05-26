<?php

namespace Tests;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Mockery;

abstract class TestCase extends BaseTestCase
{
    public function tearDown(): void
    {
        // Close Mockery after each test
        Mockery::close();
        parent::tearDown();
    }
}
