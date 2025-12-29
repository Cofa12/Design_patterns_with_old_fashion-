<?php

namespace Cofa\DesignPatternsWithOldFashion\Strategy\Problem\Duck\WithDesignPattern\Concretes;


use Cofa\DesignPatternsWithOldFashion\Strategy\Problem\Duck\WithDesignPattern\Contracts\DuckDisplay;
use Override;

final class NotDisplay implements DuckDisplay
{
    #[Override]
    public function display():string
    {
        return "";
    }
}