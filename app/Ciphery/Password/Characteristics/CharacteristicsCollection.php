<?php

declare(strict_types=1);

namespace App\Ciphery\Password\Characteristics;

use App\Ciphery\Password\Characteristics\Contracts\Characteristic;

class CharacteristicsCollection
{

    /** @var array<string, HashingAlgo> */
    protected array $characteristics = [];

    /** @param Characteristic[] $characteristics */
    public function __construct(array $characteristics)
    {
        array_walk(
            $characteristics,
            fn(Characteristic $ch) => $this->characteristics[$ch->getId()] = $ch
        );
    }

    /** @return Characteristic|null */
    public function get(string $characteristicId): ?Characteristic
    {
        return $this->characteristics[$characteristicId] ?? null;
    }

    /** @return array<string, Characteristic> */
    public function all(): array
    {
        return $this->characteristics;
    }

    /** @return string[] */
    public function allCharacteristicsIds(): array
    {
        return array_keys($this->characteristics);
    }

    /** @return int */
    public function count(): int
    {
        return count($this->characteristics);
    }

}
