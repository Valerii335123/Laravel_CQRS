<?php
declare(strict_types=1);

namespace Infrastructure\Events\Dispatchers;

/**
 * Interface EventDispatcherInterface
 * @package App\Services\Dispatchers
 */
interface EventDispatcherInterface
{
    /**
     * @param array $events
     */
    public function dispatchAll(array $events): void;

    /**
     * @param $event
     */
    public function dispatch($event): void;
}