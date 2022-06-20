<?php


namespace Infrastructure\CommandHandling;

/**
 * Class AbstractCommand
 * @package App\Infrastructure\CommandHandling
 */
abstract class AbstractCommand
{
    /**
     * @var bool
     */
    public bool $byQueue = false;

    /**
     * @var string
     */
    public string $queue = 'default';

    /**
     * @var bool
     */
    public bool $uniqueQueue = true;
}
