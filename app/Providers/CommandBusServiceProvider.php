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
                    Models\Comment\UseCase\CreateByUser\Command::class,
                    Models\Comment\UseCase\CreateByUser\Handler::class
                );
                $commandBuss->subscribe(
                    Models\Comment\UseCase\UpdateByUser\Command::class,
                    Models\Comment\UseCase\UpdateByUser\Handler::class
                );
                $commandBuss->subscribe(
                    Models\User\Services\Profile\Update\Command::class,
                    Models\User\Services\Profile\Update\Handler::class
                );

                $commandBuss->subscribe(
                    Models\Storage\Services\CreateOrUpdate\ByUser\Command::class,
                    Models\Storage\Services\CreateOrUpdate\ByUser\Handler::class
                );

                $commandBuss->subscribe(
                    Models\Pages\Support\UseCase\ContactUs\Create\Command::class,
                    Models\Pages\Support\UseCase\ContactUs\Create\Handler::class
                );

                $commandBuss->subscribe(
                    Models\Product\Services\Book\RecalculateRating\Command::class,
                    Models\Product\Services\Book\RecalculateRating\Handler::class
                );

                $commandBuss->subscribe(
                    Models\Product\Services\Author\RecalculateRating\Command::class,
                    Models\Product\Services\Author\RecalculateRating\Handler::class
                );

                $commandBuss->subscribe(
                    Models\Product\Services\PublishingHouse\RecalculateRating\Command::class,
                    Models\Product\Services\PublishingHouse\RecalculateRating\Handler::class
                );

                $commandBuss->subscribe(
                    Models\User\Services\FavoriteBook\Add\Command::class,
                    Models\User\Services\FavoriteBook\Add\Handler::class
                );

                $commandBuss->subscribe(
                    Models\User\Services\FavoriteBook\Remove\Command::class,
                    Models\User\Services\FavoriteBook\Remove\Handler::class
                );
                $commandBuss->subscribe(
                    Models\Product\Services\Book\ReviewedBooks\Command::class,
                    Models\Product\Services\Book\ReviewedBooks\Handler::class
                );

                $commandBuss->subscribe(
                    Models\User\Services\Order\UseCase\ByUser\CreateOrUpdate\Command::class,
                    Models\User\Services\Order\UseCase\ByUser\CreateOrUpdate\Handler::class
                );

                $commandBuss->subscribe(
                    Models\User\Services\Order\CreateOrUpdate\Command::class,
                    Models\User\Services\Order\CreateOrUpdate\Handler::class
                );

                $commandBuss->subscribe(
                    Models\User\Services\Order\Product\CreateOrUpdate\Command::class,
                    Models\User\Services\Order\Product\CreateOrUpdate\Handler::class
                );

                $commandBuss->subscribe(
                    Models\User\Services\Order\Product\Remove\Command::class,
                    Models\User\Services\Order\Product\Remove\Handler::class
                );

                $commandBuss->subscribe(
                    Models\User\Services\Order\UseCase\ByUser\Checkout\Command::class,
                    Models\User\Services\Order\UseCase\ByUser\Checkout\Handler::class
                );

                $commandBuss->subscribe(
                    Models\User\Services\Order\Payment\Fail\Command::class,
                    Models\User\Services\Order\Payment\Fail\Handler::class
                );

                $commandBuss->subscribe(
                    Models\User\Services\Order\Payment\Success\Command::class,
                    Models\User\Services\Order\Payment\Success\Handler::class
                );

                $commandBuss->subscribe(
                    Models\User\Services\Order\Payment\Create\Command::class,
                    Models\User\Services\Order\Payment\Create\Handler::class
                );

                $commandBuss->subscribe(
                    Models\User\Services\UseCase\Create\Command::class,
                    Models\User\Services\UseCase\Create\Handler::class
                );

                $commandBuss->subscribe(
                    Models\Product\Services\PublishingHouse\UseCase\CreateOrUpdate\Command::class,
                    Models\Product\Services\PublishingHouse\UseCase\CreateOrUpdate\Handler::class
                );

                $commandBuss->subscribe(
                    Models\User\Services\Publisher\PublishingHouse\CreateOrUpdate\Command::class,
                    Models\User\Services\Publisher\PublishingHouse\CreateOrUpdate\Handler::class
                );

                $commandBuss->subscribe(
                    Models\Product\Services\Book\UseCase\CreateOrUpdate\Command::class,
                    Models\Product\Services\Book\UseCase\CreateOrUpdate\Handler::class
                );

                $commandBuss->subscribe(
                    Models\Storage\Services\Book\MainFile\CreateOrUpdate\Command::class,
                    Models\Storage\Services\Book\MainFile\CreateOrUpdate\Handler::class
                );

                $commandBuss->subscribe(
                    Models\Storage\Services\Book\BookFileImport\CreateOrUpdate\Command::class,
                    Models\Storage\Services\Book\BookFileImport\CreateOrUpdate\Handler::class
                );

                $commandBuss->subscribe(
                    Models\Product\Services\Book\UseCase\Delete\Command::class,
                    Models\Product\Services\Book\UseCase\Delete\Handler::class
                );

                $commandBuss->subscribe(
                    Models\Product\Services\Book\UseCase\ChangeVisibility\Command::class,
                    Models\Product\Services\Book\UseCase\ChangeVisibility\Handler::class
                );

                $commandBuss->subscribe(
                    Models\Storage\Services\Book\Images\CreateOrUpdate\Command::class,
                    Models\Storage\Services\Book\Images\CreateOrUpdate\Handler::class
                );

                $commandBuss->subscribe(
                    Models\Storage\UseCase\CreateOrUpdate\Command::class,
                    Models\Storage\UseCase\CreateOrUpdate\Handler::class
                );

                $commandBuss->subscribe(
                    Models\Storage\UseCase\Delete\Command::class,
                    Models\Storage\UseCase\Delete\Handler::class
                );

                $commandBuss->subscribe(
                    Models\Search\UseCase\Index\Create\Command::class,
                    Models\Search\UseCase\Index\Create\Handler::class
                );

                $commandBuss->subscribe(
                    Models\Search\UseCase\Index\Delete\Command::class,
                    Models\Search\UseCase\Index\Delete\Handler::class
                );

                $commandBuss->subscribe(
                    Models\Product\Services\Author\CreateOrUpdate\Command::class,
                    Models\Product\Services\Author\CreateOrUpdate\Handler::class
                );

                $commandBuss->subscribe(
                    Models\DataMigration\UseCase\CreateOrUpdate\Command::class,
                    Models\DataMigration\UseCase\CreateOrUpdate\Handler::class
                );

                $commandBuss->subscribe(
                    Models\Storage\Services\Upload\Command::class,
                    Models\Storage\Services\Upload\Handler::class
                );

                $commandBuss->subscribe(
                    Models\Content\Services\SendSubscription\Command::class,
                    Models\Content\Services\SendSubscription\Handler::class
                );
                //Api
                $commandBuss->subscribe(
                    Models\Api\User\Services\Profile\Edit\Command::class,
                    Models\Api\User\Services\Profile\Edit\Handler::class
                );

                $commandBuss->subscribe(
                    Models\Api\User\Services\Profile\ChangePassword\Command::class,
                    Models\Api\User\Services\Profile\ChangePassword\Handler::class
                );

                $commandBuss->subscribe(
                    Models\Product\Services\Category\CreateOrUpdate\Command::class,
                    Models\Product\Services\Category\CreateOrUpdate\Handler::class
                );

                return $commandBuss;
            }
        );
    }

}
