<?php

namespace Infrastructure\CommandHandling;

use Exception;
use Illuminate\Contracts\Bus\Dispatcher;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class IlluminateCommandBus
 * @package Infrastructure\CommandHandling
 */
class IlluminateCommandBus implements CommandBusInterface
{
    /**
     * @var array
     */
    private array $commandHandlers = [];

    /**
     * @var array
     */
    private array $queue = [];

    /**
     * @var bool
     */
    private bool $isDispatching = false;

    /**
     * @var Dispatcher
     */
    private Dispatcher $dispatcher;

    /**
     * The fallback mapping callback.
     *
     * @var callable|null
     */
    protected $mapper;

    /**
     * IlluminateCommandBus constructor.
     * @param Dispatcher $dispatcher
     */
    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * {@inheritdoc}
     */
    public function subscribe(string $commandClass, string $handlerClass): void
    {
        $this->commandHandlers[$commandClass] = $handlerClass;
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch($command): void
    {
        if (property_exists($command, 'byQueue') && $command->byQueue) {
            $this->dispatchToQueue($command);
        } else {
            $this->dispatcher->dispatch($this->getJob($command));
        }
    }

    /**
     * @param $command
     * @return mixed|Response
     * @throws Exception
     */
    public function dispatchNow($command)
    {
        if ($handlerClass = $this->getHandler($command)) {
            $handler = resolve($handlerClass);

            return $handler->handle($command);
        }
        throw new CommandBusException('no handlers registered to this Command');
    }

    /**
     * @param mixed $command
     */
    public function dispatchToQueue($command): void
    {
        $this->dispatcher->dispatchToQueue($this->getJob($command));
    }

    /**
     * Register a fallback mapper callback.
     *
     * @param callable|null $mapper
     *
     * @return void
     */
    public function mapUsing(callable $mapper = null)
    {
        $this->mapper = $mapper;
    }

    /**
     * @param $command
     * @return IlluminateCommandHandlerJob
     */
    protected function getJob($command): IlluminateCommandHandlerJob
    {
        $queue = null;
        $uniqueQueue = null;
        if ($handlerClass = $this->getHandler($command)) {
            if (property_exists($command, 'queue')) {
                $queue = $command->queue;
            }
            if (property_exists($command, 'uniqueQueue')) {
                $uniqueQueue = $command->uniqueQueue;
            }

            return new IlluminateCommandHandlerJob($command, $handlerClass, $queue, $uniqueQueue);
        }
        throw new CommandBusException('no handlers registered to this Command');
    }

    private function getHandler($command)
    {
        $commandClass = get_class($command);
        if (array_key_exists($commandClass, $this->commandHandlers)) {
            return $this->commandHandlers[$commandClass];
        }

        $callback = $this->mapper;
        $handlerClass = $callback !== null ? $callback($command) : null;
        try {
            return $handlerClass && class_exists($handlerClass) ? $handlerClass : null;
        } catch (Exception $exception) {
            return null;
        }
    }
}
