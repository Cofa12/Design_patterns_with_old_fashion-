<?php

namespace Cofa\DesignPatternsWithOldFashion\Observer\WithDesignPattern;

use Override;

abstract class Channel implements ChannelBehaviour
{
    private string $channelName;
    private string $description;
    /** @var Video[] */
    private array $videos;

    /** @var Subscriber[] */
    private array $subscribers;
    public function __construct(string $channelName, string $description)
    {
        $this->channelName = $channelName;
        $this->description = $description;
        $this->videos = [];
        $this->subscribers = [];
    }

    #[Override]
    public function uploadVideo(Video $video): void
    {
        $this->videos[] = $video;
        $this->notifySubscriber();
    }

    #[Override]
    public function getSubscribers(): array
    {
        return $this->subscribers;
    }


    public function getVideos(): array
    {
        return $this->videos;
    }

    public function getLastVideo(): Video|null
    {
        return $this->videos[count($this->videos) - 1];
    }
    #[Override]
    public function notifySubscriber(): void
    {
        $lastVideo = $this->getLastVideo();

        if ($lastVideo === null) {
            return;
        }
        $message = "The video ";

        foreach ($this->subscribers as $subscriber) {
            $subscriber->notify($message, $lastVideo, $this);
        }
    }

    #[Override]
    public function addSubscriber(Subscriber $subscriber): void
    {
        $this->subscribers[] = $subscriber;
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