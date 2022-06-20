<?php

namespace Infrastructure\Events;

abstract class AbstractListener
{
    /**
     * @param AbstractEvent $event
     */
    abstract public function handle(AbstractEvent $event): void;
}