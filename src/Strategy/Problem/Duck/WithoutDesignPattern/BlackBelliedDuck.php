<?php

declare(strict_types=1);

namespace Cofa\DesignPatternsWithOldFashion\Strategy\Problem\Duck\WithoutDesignPattern;

use Override;

final class BlackBelliedDuck extends Duck
{
    public function __construct(string $color='black')
    {
        parent::__construct($color);
    }


    #[Override]
    public function quack():string
    {
        return 'Black bellied quack';
    }

    #[Override]
    public function display():string
    {
        return 'Black bellied display';
    }
}