<?php

namespace App\Models\User\UseCase\Registration;

use App\Models\User\User;
use Infrastructure\CommandHandling\AbstractCommand;
use Infrastructure\CommandHandling\AbstractHandler;

class Handler extends AbstractHandler
{

    /**
     * @param \Infrastructure\CommandHandling\AbstractCommand $command
     * @return \App\Models\User\User
     */
    public function handle(AbstractCommand $command)
    {
        $user = new User();
        $user->setName($command->name);
        $user->setEmail($command->email);
        $user->setPassword($command->password);
        $user->save();
        return $user;
    }
}
