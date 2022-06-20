<?php

namespace Infrastructure\Events\Dispatchers;

/**
 * Interface CommandBusDispatcherInterface
 * @package App\Services\Dispatchers
 */
interface CommandBusDispatcherInterface
{
    /**
     * @param array $commands
     */
    public function dispatchAll(array $commands): void;

    /**
     * @param $command
     */
    public function dispatch($command): void;

    /**
     * @param $command
     */
    public function dispatchToQueue($command): void;
}