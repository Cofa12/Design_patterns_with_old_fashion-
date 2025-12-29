<?php

namespace Tests;


use Cofa\DesignPatternsWithOldFashion\Strategy\Problem\Duck\WithoutDesignPattern\BlackBelliedDuck;
use Cofa\DesignPatternsWithOldFashion\Strategy\Problem\Duck\WithoutDesignPattern\Duck;
use Cofa\DesignPatternsWithOldFashion\Strategy\Problem\Duck\WithoutDesignPattern\SimpleDuck;
use Cofa\DesignPatternsWithOldFashion\Strategy\Problem\Duck\WithoutDesignPattern\SnowDuck;
use PHPUnit\Framework\TestCase;

/** @psalm-suppress UnusedClass */
final class TestDuckOldCode extends TestCase
{
    public function test_simple_duck_is_a_duck():void
    {
       $simpleDuck = new SimpleDuck('red');
        $this->assertInstanceOf(Duck::class, $simpleDuck);
    }
    public function test_snow_duck_is_a_duck():void
    {
       $whiteDuck = new SnowDuck('white');
        $this->assertInstanceOf(Duck::class, $whiteDuck);
    }
    public function test_black_duck_is_a_duck():void
    {
       $blackDuck = new BlackBelliedDuck('black');
        $this->assertInstanceOf(Duck::class, $blackDuck);
    }
    public function test_simple_duck_quacks_simple():void
    {
        $simpleDuck = new SimpleDuck('red');
        $this->assertSame($simpleDuck->quack(),'simple quack');
    }
    public function test_black_bellied_duck_quacks_Black_Bellied():void
    {
        $blackBellied = new BlackBelliedDuck('black');
        $this->assertSame($blackBellied->quack(),'Black bellied quack');
    }
    public function test_snow_duck_quacks_simple():void
    {
        $snowDuck = new SnowDuck('while');
        $this->assertSame($snowDuck->quack(),'simple quack');
    }
    public function test_simple_duck_has_red_color():void
    {
        $simpleDuck = new SimpleDuck('red');
        $this->assertEquals('red',$simpleDuck->getColor());
    }
    public function test_snow_duck_has_white_color():void
    {
        $simpleDuck = new SnowDuck('white');
        $this->assertEquals('white',$simpleDuck->getColor());
    }
    public function test_black_duck_has_black_color():void
    {
        $simpleDuck = new BlackBelliedDuck('black');
        $this->assertEquals('black',$simpleDuck->getColor());
    }
    public function test_simple_duck_display_nothing():void
    {
        $simpleDuck = new SimpleDuck('red');
        $this->assertSame($simpleDuck->display(),'null');
    }
    public function test_black_bellied_duck_display_Black_Bellied():void
    {
        $blackBellied = new BlackBelliedDuck('black');
        $this->assertSame($blackBellied->display(),'Black bellied display');
    }
    public function test_snow_duck_display_simple():void
    {
        $snowDuck = new SnowDuck('white');
        $this->assertSame($snowDuck->display(),'snow display');
    }


}