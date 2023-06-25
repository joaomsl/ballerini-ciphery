<?php

declare(strict_types=1);

namespace App\Ciphery\Characteristics;

use App\Ciphery\Contracts\Characteristic;
use Illuminate\Support\Collection;

class CharacteristicsCollection extends Collection
{

    /** @param array<string, Characteristic> $characteristics */
    public function __construct(array $characteristics)
    {
        parent::__construct($characteristics);
    }

}
