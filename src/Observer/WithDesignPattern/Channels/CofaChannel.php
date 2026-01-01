<?php

namespace Cofa\DesignPatternsWithOldFashion\Observer\WithDesignPattern\Channels;


use Cofa\DesignPatternsWithOldFashion\Observer\WithDesignPattern\Channel;

final class CofaChannel extends Channel
{
    public function __construct(string $channelName, string $description)
    {
        parent::__construct($channelName, $description);
    }
}