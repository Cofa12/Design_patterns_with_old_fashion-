<?php

namespace ObserverPattern\WithDesignPatternTests;

use Cofa\DesignPatternsWithOldFashion\Observer\WithDesignPattern\Channels\CofaChannel;
use Cofa\DesignPatternsWithOldFashion\Observer\WithDesignPattern\Video;
use PHPUnit\Framework\TestCase;

/** @psalm-suppress UnusedClass */
final class ChannelTest extends TestCase
{
    public function test_get_channel_data(): void
    {
        $channel = new CofaChannel("Cofa Channel", "Coding Tutorials");
        $this->assertSame('Cofa Channel',$channel->getChannelName());
        $this->assertSame("Coding Tutorials",$channel->getDescription());
    }
    public function test_channel_can_upload_video():void
    {
        $channel = new CofaChannel("Cofa Channel", "Coding Tutorials");
        $video = new Video(
            'https://www.youtube.com/watch?v=Cofa Channel',
            'First Video',
            'this is a simple description',
            'https://www.youtube.com/?thumbnail=q.png',
        );

        $channel->uploadVideo($video);
        $this->assertContains($video, $channel->getVideos());
    }
    public function test_channel_get_last_video():void
    {
        $channel = new CofaChannel("Cofa Channel", "Coding Tutorials");
        $video1 = new Video(
            'https://www.youtube.com/watch?v=Cofa Channel',
            'First Video',
            'this is a simple description',
            'https://www.youtube.com/?thumbnail=q.png',
        );

        $video2 = new Video(
            'https://www.youtube.com/watch?v=Cofa Channelff',
            'First Videffo',
            'this is a simple ffff',
            'https://www.youtube.com/?thumbnail=qee.png',
        );

        $channel->uploadVideo($video1);
        $channel->uploadVideo($video2);

        $this->assertSame($video2, $channel->getLastVideo());
    }
}