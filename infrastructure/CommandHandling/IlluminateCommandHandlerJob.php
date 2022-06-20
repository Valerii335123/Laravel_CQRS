<?php

namespace Infrastructure\CommandHandling;

/**
 * Class IlluminateCommandHandlerJob
 * @package Infrastructure\CommandHandling
 */
class IlluminateCommandHandlerJob
{

    public $tries = 5;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    /** @var object */
    private $command;
    /** @var string Command Handler Class Namespace */
    private $handlerClass;
    /** @var string Queue category */
    public $queue = 'default';

    public $unique = false;

    public function __construct($command, string $handlerClass, string $queue = null, $unique = null)
    {
        $this->command = $command;
        $this->handlerClass = $handlerClass;
        if (null !== $queue) {
            $this->queue = $queue;
        }
        if (null !== $unique) {
            $this->unique = $unique;
        }
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        $handler = resolve($this->handlerClass);
        $handler->handle($this->command);
    }
}
