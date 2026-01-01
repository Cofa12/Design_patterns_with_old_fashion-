<?php

namespace ObserverPattern\WithoutDesignPatternTests;

use Cofa\DesignPatternsWithOldFashion\Observer\WithoutDesignPattern\Channels\CofaChannel;
use Cofa\DesignPatternsWithOldFashion\Observer\WithoutDesignPattern\Video;
use Cofa\DesignPatternsWithOldFashion\Observer\WithoutDesignPattern\Visitors\FirstVisitor;
use PHPUnit\Framework\TestCase;

/** @psalm-suppress UnusedClass */
final class MainFlowTest extends TestCase
{
    public function test_visitor_polling_mechanism(): void
    {
        $channel = new CofaChannel("Cofa Channel", "Coding Tutorials");

        $visitor = new FirstVisitor("John Doe");

        $video = new Video(
            "url",
            "Design Patterns Intro",
            "Strategy Pattern",
            "thumb.jpg"
        );
        $channel->uploadVideo($video);
        $channel->changeNewVideoUploadedToTrue();

        $this->assertTrue($visitor->askForNewVideo($channel));

        $lastVideo = $channel->getLastVideo();
        $this->assertNotNull($lastVideo);
    }
}
