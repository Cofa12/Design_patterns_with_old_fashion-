<?php

namespace Cofa\DesignPatternsWithOldFashion\Observer\WithDesignPattern;

interface ChannelBehaviour
{
    public function uploadVideo(Video $video): void;
    public function notifySubscriber(): void;
    public function addSubscriber(Subscriber $subscriber): void;
    public function getSubscribers(): array;

}