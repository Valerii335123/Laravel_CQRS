<?php


namespace Infrastructure\CommandHandling;


interface CommandHandlerInterface
{
    /**
     * @param mixed $command
     */
    public function handle($command): void;
}