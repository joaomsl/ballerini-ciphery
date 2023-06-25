<?php

declare(strict_types=1);

namespace App\Ciphery\Contracts;

interface HashingAlgo extends Option
{

    /** @return string */
    public function hash(string $password): string;

}
