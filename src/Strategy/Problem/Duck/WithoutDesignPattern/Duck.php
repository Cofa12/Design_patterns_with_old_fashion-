<?php

declare(strict_types=1);

namespace Cofa\DesignPatternsWithOldFashion\Strategy\Problem\Duck\WithoutDesignPattern;
abstract class Duck
{
    private string $color;
    public function __construct(string $color)
    {
        $this->color = $color;
    }

    public function getColor():string
    {
        return $this->color;
    }

    public abstract function quack():string;
    public abstract function display():string;
}