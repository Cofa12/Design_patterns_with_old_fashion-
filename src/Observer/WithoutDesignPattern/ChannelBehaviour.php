<?php

namespace Cofa\DesignPatternsWithOldFashion\Observer\WithoutDesignPattern;

interface ChannelBehaviour
{
    public function uploadVideo(Video $video): void;
    public function changeNewVideoUploadedToTrue(): void;
    public function isThereNewVideo(): bool;

    public function getLastVideo(): Video|null;
}