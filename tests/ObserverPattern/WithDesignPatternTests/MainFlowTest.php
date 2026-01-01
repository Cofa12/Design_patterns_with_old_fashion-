<?php

namespace ObserverPattern\WithDesignPatternTests;

use Cofa\DesignPatternsWithOldFashion\Observer\WithDesignPattern\Channels\CofaChannel;
use Cofa\DesignPatternsWithOldFashion\Observer\WithDesignPattern\Subscriber;
use Cofa\DesignPatternsWithOldFashion\Observer\WithDesignPattern\Subscribers\FirstSubscriber;
use Cofa\DesignPatternsWithOldFashion\Observer\WithDesignPattern\Subscribers\SecondSubscriber;
use Cofa\DesignPatternsWithOldFashion\Observer\WithDesignPattern\Video;
use PHPUnit\Framework\TestCase;

/** @psalm-suppress UnusedClass */
final class MainFlowTest extends TestCase
{
    public function test_channel_can_add_subscribers(): void
    {
        $channel = new CofaChannel("Cofa Channel", "Coding Tutorials");
        $subscriber1 = new FirstSubscriber('cofa');
        $subscriber2 = new SecondSubscriber('gemy');

        $channel->addSubscriber($subscriber1);
        $channel->addSubscriber($subscriber2);

        $this->assertContains($subscriber1,$channel->getSubscribers());
        $this->assertContains($subscriber2,$channel->getSubscribers());
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

        $subscriber1 = new FirstSubscriber('cofa');
        $subscriber2 = new SecondSubscriber('gemy');

        $channel->addSubscriber($subscriber1);
        $channel->addSubscriber($subscriber2);


        $channel->uploadVideo($video);
        $this->assertContains($video, $channel->getVideos());
    }

    public function test_subscribers_are_notified_when_video_is_uploaded(): void
    {
        $channel = new CofaChannel("Cofa Channel", "Coding Tutorials");

        $subscriber = new FirstSubscriber("John Doe");
        $channel->addSubscriber($subscriber);

        $video = new Video(
            "https://youtu.be/dQw4w9WgXcQ",
            "Rick Astley - Never Gonna Give You Up",
            "Best song ever",
            "thumb.jpg"
        );
        $channel->uploadVideo($video);


        $mockSubscriber = $this->createMock(Subscriber::class);
        $mockSubscriber->expects($this->once())
            ->method('notify')
            ->with(
                $this->stringContains("The video "),
                $this->identicalTo($video),
                $this->identicalTo($channel)
            )
            ->willReturn("Notification received");

        $channel->addSubscriber($mockSubscriber);
        $channel->notifySubscriber();

    }

    public function test_concrete_subscriber_logic(): void
    {
        $channel = new CofaChannel("Cofa Channel", "Coding Tutorials");
        $subscriber = new FirstSubscriber("Jane Doe");
        $video = new Video("url", "Test Video", "desc", "img");

        $response = $subscriber->notify("Update", $video, $channel);

        $this->assertStringContainsString("Test Video", $response);
        $this->assertStringContainsString("Cofa Channel", $response);
    }
}
