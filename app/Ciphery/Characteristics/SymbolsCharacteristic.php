<?php

declare(strict_types=1);

namespace App\Ciphery\Characteristics;

use App\Ciphery\Support\SafeGenerator;

class SymbolsCharacteristic extends BaseCharacteristic
{

    /** @inheritDoc */
    public function generateCharacters(int $length): string
    {
        return SafeGenerator::symbols($length);
    }

}
