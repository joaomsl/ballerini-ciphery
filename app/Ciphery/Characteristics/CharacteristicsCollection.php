<?php

declare(strict_types=1);

namespace App\Ciphery\Characteristics;

use App\Ciphery\Contracts\Characteristic;
use Illuminate\Support\Collection;

class CharacteristicsCollection extends Collection
{

    /** @param Characteristic[] $characteristics */
    public function __construct(array $characteristics)
    {
        foreach($characteristics as $characteristic) {
            $this->put($characteristic->getId(), $characteristic);
        }
    }

}
