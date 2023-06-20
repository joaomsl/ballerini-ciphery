<?php

declare(strict_types=1);

namespace App\Ciphery\HashingAlgo;

class Md5HashingAlgo extends BaseHashingAlgo
{

    /** @inheritDoc */
    public function hash(string $password): string
    {
        return md5($password);
    }

}
