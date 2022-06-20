<?php

namespace Infrastructure\CommandHandling;

/**
 * Class AbstractHandler
 * @package Infrastructure\CommandHandling
 */
abstract class AbstractHandler
{
    /**
     * @param AbstractCommand $command
     * @return mixed
     */
    abstract public function handle(AbstractCommand $command);
}