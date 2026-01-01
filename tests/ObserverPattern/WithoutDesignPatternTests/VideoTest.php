<?php

namespace ObserverPattern\WithoutDesignPatternTests;

use Cofa\DesignPatternsWithOldFashion\Observer\WithoutDesignPattern\Video;
use PHPUnit\Framework\TestCase;

/** @psalm-suppress UnusedClass */
final class VideoTest extends TestCase
{
    public function test_get_video_data():void
    {
        $video = new Video("url",
            "Design Patterns Intro",
            "Strategy Pattern",
            "thumb.jpg");

        $this->assertSame('url', $video->getUrl());
        $this->assertSame('Design Patterns Intro', $video->getTitle());
        $this->assertSame('Strategy Pattern', $video->getDescription());
        $this->assertSame('thumb.jpg',$video->getThumbnailUrl());
    }

}