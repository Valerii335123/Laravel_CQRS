<?php

namespace App\Models\User\UseCase\Registration;



use Infrastructure\CommandHandling\AbstractCommand;

/**
 * @property  $name
 * @property  $email
 * @property  $password
 */
class Command extends AbstractCommand
{

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     */
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {
    }
}
