<?php

namespace Cofa\DesignPatternsWithOldFashion\Observer\WithoutDesignPattern;

use Cofa\DesignPatternsWithOldFashion\Observer\WithoutDesignPattern\Video;
use Override;

abstract class Channel implements ChannelBehaviour
{
    private string $channelName;
    private string $description;
    private bool $newVideoUpload;
    /** @var Video[] */
    private array $videos;
    public function __construct(string $channelName, string $description)
    {
        $this->channelName = $channelName;
        $this->description = $description;
        $this->newVideoUpload = false;
        $this->videos = [];
    }

    #[Override]
    public function uploadVideo(Video $video): void
    {
        $this->videos[] = $video;
    }

    public function getVideos(): array
    {
        return $this->videos;
    }

    #[Override]
    public function getLastVideo(): Video|null
    {
        return array_pop($this->videos);
    }

    #[Override]
    public function changeNewVideoUploadedToTrue(): void
    {
        $this->newVideoUpload = true;
    }

    #[Override]
    public function isThereNewVideo(): bool
    {
        return $this->newVideoUpload;
    }

    public function getChannelName(): string
    {
        return $this->channelName;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

}