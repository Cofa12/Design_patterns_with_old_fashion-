<?php

declare(strict_types=1);

namespace Cofa\DesignPatternsWithOldFashion\Strategy\Problem\Duck\WithDesignPattern;


use Cofa\DesignPatternsWithOldFashion\Strategy\Problem\Duck\WithDesignPattern\Contracts\DuckDisplay;
use Cofa\DesignPatternsWithOldFashion\Strategy\Problem\Duck\WithDesignPattern\Contracts\DuckQuack;

final class Duck
{
    private string $color;
    private DuckDisplay $duckDisplay;
    private DuckQuack $duckQuack;
    public function __construct(string $color,DuckDisplay $duckDisplay, DuckQuack $duckQuack)
    {
        $this->color = $color;
        $this->duckDisplay = $duckDisplay;
        $this->duckQuack = $duckQuack;
    }

    public function getColor():string
    {
        return $this->color;
    }

    public function quack():string
    {
        return $this->duckQuack->quack();
    }
    public function display():string
    {
        return $this->duckDisplay->display();
    }
}