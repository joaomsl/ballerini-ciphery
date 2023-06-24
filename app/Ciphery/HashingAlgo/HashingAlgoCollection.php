<?php

declare(strict_types=1);

namespace App\Ciphery\HashingAlgo;

use App\Ciphery\Contracts\HashingAlgo;
use Illuminate\Support\Collection;

class HashingAlgoCollection extends Collection
{

    /** @param HashingAlgo[] $hashingAlgos */
    public function __construct(array $hashingAlgos)
    {
        foreach($hashingAlgos as $algo) {
            $this->put($algo->getId(), $algo);
        }
    }

}
