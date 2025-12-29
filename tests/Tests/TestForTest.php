<?php

declare(strict_types=1);

namespace Tests;
use PHPUnit\Framework\TestCase;

class TestForTest extends TestCase
{
    public function test_the_same():void
    {
        $this->assertTrue(true);
    }
}