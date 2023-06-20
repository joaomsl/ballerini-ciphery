<?php

declare(strict_types=1);

namespace App\Ciphery\HashingAlgo;

use App\Ciphery\HashingAlgo\Contracts\HashingAlgo;

class HashingAlgoCollection
{

    /** @var array<string, HashingAlgo> */
    protected array $hashingAlgos = [];

    /** @param HashingAlgo[] $hashingAlgos */
    public function __construct(array $hashingAlgos)
    {
        array_walk(
            $hashingAlgos,
            fn(HashingAlgo $algo) => $this->hashingAlgos[$algo->getId()] = $algo
        );
    }

    /** @return HashingAlgo|null */
    public function get(string $hashingAlgoId): ?HashingAlgo
    {
        return $this->hashingAlgos[$hashingAlgoId] ?? null;
    }

    /** @return array<string, HashingAlgo> */
    public function all(): array
    {
        return $this->hashingAlgos;
    }

    /** @return string[] */
    public function allHashingIds(): array
    {
        return array_keys($this->hashingAlgos);
    }

    /** @return int */
    public function count(): int
    {
        return count($this->hashingAlgos);
    }

}
