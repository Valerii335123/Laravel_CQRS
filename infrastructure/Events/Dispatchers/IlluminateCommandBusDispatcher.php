<?php

namespace Infrastructure\Events\Dispatchers;

use Illuminate\Contracts\Bus\Dispatcher;

/**
 * Class IlluminateCommandBusDispatcher
 * @package App\Services\Dispatchers
 */
class IlluminateCommandBusDispatcher implements CommandBusDispatcherInterface
{
    /**
     * @var Dispatcher
     */
    private Dispatcher $dispatcher;

    /**
     * @param Dispatcher $dispatcher
     */
    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param array $commands
     */
    public function dispatchAll(array $commands): void
    {
        foreach ($commands as $event) {
            $this->dispatch($event);
        }
    }

    /**
     * @param $command
     */
    public function dispatch($command): void
    {
        $this->dispatcher->dispatch($command);
    }

    /**
     * @param $command
     */
    public function dispatchToQueue($command): void
    {
        $this->dispatcher->dispatchToQueue($command);
    }
}