<?php

declare(strict_types=1);

namespace App\Ciphery\HashingAlgo;

use App\Ciphery\Contracts\HashingAlgo;
use Illuminate\Support\Collection;

class HashingAlgoCollection extends Collection
{

    /** @param array<string, HashingAlgo> $hashingAlgos */
    public function __construct(array $hashingAlgos)
    {
        parent::__construct($hashingAlgos);
    }

}
