<?php

namespace Infrastructure\Events\Models;

use Infrastructure\Events\AbstractEvent;

trait EventsTrait
{
    /**
     * @var array
     */
    private array $recordedEvents = [];

    /**
     * @param AbstractEvent $event
     */
    public function recordEvent(AbstractEvent $event): void
    {
        $this->recordedEvents[] = $event;
    }

    /**
     * @return array
     */
    public function releaseEvents(): array
    {
        $events = $this->recordedEvents;
        $this->recordedEvents = [];
        return $events;
    }
}