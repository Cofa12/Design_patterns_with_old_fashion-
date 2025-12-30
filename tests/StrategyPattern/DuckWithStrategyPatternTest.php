<?php


namespace Tests\StrategyPattern;;

use Cofa\DesignPatternsWithOldFashion\Strategy\Problem\Duck\WithDesignPattern\Concretes\Display;
use Cofa\DesignPatternsWithOldFashion\Strategy\Problem\Duck\WithDesignPattern\Concretes\NotDisplay;
use Cofa\DesignPatternsWithOldFashion\Strategy\Problem\Duck\WithDesignPattern\Concretes\NotQuack;
use Cofa\DesignPatternsWithOldFashion\Strategy\Problem\Duck\WithDesignPattern\Concretes\Quack;
use Cofa\DesignPatternsWithOldFashion\Strategy\Problem\Duck\WithDesignPattern\Duck;
use PHPUnit\Framework\TestCase;

/** @psalm-suppress UnusedClass */
final class DuckWithStrategyPatternTest extends TestCase
{
    public function test_simple_duck_can_quack_and_can_not_display_and_red(): void
    {
        $quackable = new Quack();
        $cannotDisplay = new NotDisplay();
        $simpleDuck = new Duck('red', $cannotDisplay, $quackable);

        $this->assertSame($simpleDuck->quack(), 'quack');
        $this->assertSame($simpleDuck->display(), '');
        $this->assertSame($simpleDuck->getColor(), 'red');
    }

    public function test_snow_duck_can_quack_and_can_display_while(): void
    {
        $quackable = new Quack();
        $displayalbe = new Display();
        $snowDuck = new Duck('white', $displayalbe, $quackable);

        $this->assertSame($snowDuck->quack(), 'quack');
        $this->assertSame($snowDuck->display(), 'display');
        $this->assertSame($snowDuck->getColor(), 'white');
    }

    public function test_black_duck_can_not_quack_and_can_not_display_and_black(): void
    {
        $cannotQuackable = new NotQuack();
        $cannotDisplay = new NotDisplay();
        $blackDuck = new Duck('black', $cannotDisplay, $cannotQuackable);

        $this->assertSame($blackDuck->quack(), '');
        $this->assertSame($blackDuck->display(), '');
        $this->assertSame($blackDuck->getColor(), 'black');
    }
}