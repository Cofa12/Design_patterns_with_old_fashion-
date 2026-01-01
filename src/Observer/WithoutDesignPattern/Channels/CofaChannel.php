<?php

namespace Cofa\DesignPatternsWithOldFashion\Observer\WithoutDesignPattern\Channels;


use Cofa\DesignPatternsWithOldFashion\Observer\WithoutDesignPattern\Channel;

final class CofaChannel extends Channel
{
    public function __construct(string $channelName, string $description)
    {
        parent::__construct($channelName, $description);
    }
}