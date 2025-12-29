<?php

namespace Cofa\DesignPatternsWithOldFashion\Strategy\Problem\Duck\WithDesignPattern\Concretes;


use Cofa\DesignPatternsWithOldFashion\Strategy\Problem\Duck\WithDesignPattern\Contracts\DuckQuack;
use Override;

final class NotQuack implements DuckQuack
{
    #[Override]
    public function quack():string
    {
        return '';
    }
}