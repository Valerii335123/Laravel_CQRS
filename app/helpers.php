<?php

use Infrastructure\CommandHandling\CommandBusInterface;

if (!function_exists('executeNow')) {
    /**
     * Send the given command to the dispatcher for execution.
     *
     * @param object $command
     *
     * @return mixed
     */
    function executeNow($command)
    {
        return app(CommandBusInterface::class)->dispatchNow($command);
    }
}

if (!function_exists('execute')) {
    /**
     * Send the given command to the dispatcher for execution.
     *
     * @param object $command
     *
     * @return void
     */
    function execute($command)
    {
        app(CommandBusInterface::class)->dispatch($command);
    }
}
