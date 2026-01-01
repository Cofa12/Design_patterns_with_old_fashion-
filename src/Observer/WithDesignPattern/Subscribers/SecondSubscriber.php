<?php

namespace Cofa\DesignPatternsWithOldFashion\Observer\WithDesignPattern\Subscribers;

use Cofa\DesignPatternsWithOldFashion\Observer\WithDesignPattern\Channel;
use Cofa\DesignPatternsWithOldFashion\Observer\WithDesignPattern\Subscriber;
use Cofa\DesignPatternsWithOldFashion\Observer\WithDesignPattern\Video;
use Override;

final class SecondSubscriber implements Subscriber
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    #[Override]
    public function notify(string $message,Video $video,Channel $channel):string
    {
        return 'The new video '.$video->getTitle(). ' was uploaded for the channel '.$channel->getChannelName().'.';
    }

    public function getName():string
    {
        return $this->name;
    }
}