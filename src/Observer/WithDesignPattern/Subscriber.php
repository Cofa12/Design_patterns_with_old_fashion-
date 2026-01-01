<?php

namespace Cofa\DesignPatternsWithOldFashion\Observer\WithDesignPattern;

interface Subscriber
{
    public function notify(string $message,Video $video,Channel $channel):string;
}