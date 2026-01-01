<?php

namespace ObserverPattern\WithDesignPatternTests;

use Cofa\DesignPatternsWithOldFashion\Observer\WithoutDesignPattern\Visitors\FirstVisitor;
use PHPUnit\Framework\TestCase;


/** @psalm-suppress UnusedClass */
final class VisitorTest extends TestCase
{
    public function test_get_visitor_personal_data():void
    {
        $visitor = new FirstVisitor('cofa');
        $this->assertSame('cofa', $visitor->getName());
    }

}