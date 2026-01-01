<?php

namespace ObserverPattern\WithDesignPatternTests;

use Cofa\DesignPatternsWithOldFashion\Observer\WithDesignPattern\Subscribers\FirstSubscriber;
use Cofa\DesignPatternsWithOldFashion\Observer\WithDesignPattern\Subscribers\SecondSubscriber;
use PHPUnit\Framework\TestCase;

/** @psalm-suppress UnusedClass */
final class SubscribersTest extends TestCase
{
    public function test_get_name_in_first_subscriber():void
    {
        $subscriber = new FirstSubscriber('cofa');
        $this->assertSame('cofa', $subscriber->getName());

    }

    public function test_get_name_in_second_subscriber():void
    {
        $subscriber = new SecondSubscriber('cofa');
        $this->assertSame('cofa', $subscriber->getName());

    }
}