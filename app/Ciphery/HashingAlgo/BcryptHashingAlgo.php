<?php

declare(strict_types=1);

namespace App\Ciphery\HashingAlgo;

class BcryptHashingAlgo extends BaseHashingAlgo
{

    /** @inheritDoc */
    public function hash(string $password): string
    {
        return bcrypt($password);
    }

}
