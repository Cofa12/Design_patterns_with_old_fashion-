<?php
declare(strict_types=1);

namespace Cofa\DesignPatternsWithOldFashion\Strategy\Problem\Duck\WithoutDesignPattern;

use Override;

final class SnowDuck extends Duck
{

    public function __construct(string $color='white')
    {
        parent::__construct($color);
    }

    // the quake of snow duck is the same of simple quack so I need to duplicate the implementation of simple
    // duck into the snow duck
    #[Override]
    public function quack(): string
    {
        return 'simple quack';
    }

    #[Override]
    public function display(): string
    {
        return 'snow display';
    }
}