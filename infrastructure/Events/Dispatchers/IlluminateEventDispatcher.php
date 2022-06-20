<?php
/**
 * Created by PhpStorm.
 * User: yuko
 * Date: 05.09.19
 * Time: 15:33
 */

namespace Infrastructure\Events\Dispatchers;


use Illuminate\Events\Dispatcher;

/**
 * Laravel related implementation for events
 *
 * Class IlluminateEventDispatcher
 * @package App\Services\Dispatchers
 */
class IlluminateEventDispatcher implements EventDispatcherInterface
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
     * @param array $events
     */
    public function dispatchAll(array $events): void
    {
        foreach ($events as $event) {
            $this->dispatch($event);
        }
    }

    /**
     * @param $event
     */
    public function dispatch($event): void
    {
        $this->dispatcher->dispatch($event);
    }
}