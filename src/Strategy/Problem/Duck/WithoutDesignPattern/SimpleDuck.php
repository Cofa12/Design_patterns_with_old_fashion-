<?php
declare(strict_types=1);

namespace Cofa\DesignPatternsWithOldFashion\Strategy\Problem\Duck\WithoutDesignPattern;

use Override;

final class SimpleDuck extends Duck
{
    public function __construct(string $color='red')
    {
        parent::__construct($color);
    }

    #[Override]
    public function quack():string
    {
        return 'simple quack';
    }

    // I don't need the display here because simple duck doesn't display (I just return null not to spoil the code analyzer)
    #[Override]
    public function display():string
    {
        return 'null';
    }

}
