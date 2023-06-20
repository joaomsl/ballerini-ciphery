<?php

declare(strict_types=1);

namespace App\Ciphery\HashingAlgo;

class Sha1HashingAlgo extends BaseHashingAlgo
{

    /** @inheritDoc */
    public function hash(string $password): string
    {
        return sha1($password);
    }

}
