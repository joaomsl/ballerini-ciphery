<?php

declare(strict_types=1);

namespace App\Ciphery\HashingAlgo\Contracts;

use App\Ciphery\Support\Contracts\Option;

interface HashingAlgo extends Option
{

    /** @return string */
    public function hash(string $password): string;

}
