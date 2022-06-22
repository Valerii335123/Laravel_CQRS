<?php

namespace App\Providers;


use App\Models;
use Illuminate\Support\ServiceProvider;
use Infrastructure\CommandHandling\CommandBusInterface;
use Infrastructure\CommandHandling\IlluminateCommandBus;

/**
 * Class CommandBusServiceProvider
 * @package App\Providers
 */
class CommandBusServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //IlluminateCommandBusDispatcher
        $this->app->singleton(
            CommandBusInterface::class,
            function () {
                /** @var CommandBusInterface $commandBuss */
                $commandBuss = resolve(IlluminateCommandBus::class);

                $commandBuss->subscribe(
                    Models\User\UseCase\Registration\Command::class,
                    Models\User\UseCase\Registration\Handler::class
                );

                return $commandBuss;
            }
        );
    }

}
