<?php

namespace Cofa\DesignPatternsWithOldFashion\Observer\WithoutDesignPattern\Visitors;

use Cofa\DesignPatternsWithOldFashion\Observer\WithoutDesignPattern\Channel;
use Cofa\DesignPatternsWithOldFashion\Observer\WithoutDesignPattern\Video;
use Cofa\DesignPatternsWithOldFashion\Observer\WithoutDesignPattern\Visitor;
use Override;

final class FirstVisitor implements Visitor
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    // this visitor always asks for new videos , so this will cause the problem of polling.
    #[Override]
    public function askForNewVideo(Channel $channel): bool
    {
        return $channel->isThereNewVideo();
    }

    #[Override]
    public function watchNewVideo(Video $video): bool
    {
        return true;
    }

    public function getName(): string
    {
        return $this->name;
    }
}