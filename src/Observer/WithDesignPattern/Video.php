<?php

namespace Cofa\DesignPatternsWithOldFashion\Observer\WithDesignPattern;

final class Video
{
    private string $url;
    private string $title;
    private string $description;
    private string $thumbnailUrl;

    public function __construct(string $url, string $title, string $description, string $thumbnailUrl)
    {
        $this->url = $url;
        $this->title = $title;
        $this->description = $description;
        $this->thumbnailUrl = $thumbnailUrl;
    }

    public function getUrl(): string
    {
        return $this->url;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getThumbnailUrl(): string
    {
        return $this->thumbnailUrl;
    }
}