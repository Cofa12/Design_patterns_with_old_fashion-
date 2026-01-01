<?php

namespace Cofa\DesignPatternsWithOldFashion\Observer\WithoutDesignPattern;

interface Visitor
{
    public function askForNewVideo(Channel $channel): bool;
}