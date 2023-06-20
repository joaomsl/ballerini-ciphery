<?php

declare(strict_types=1);

namespace App\Ciphery\Password\Characteristics;

use App\Ciphery\Password\Characteristics\Support\SafeGenerator;
use Illuminate\Support\Str;

class CapitalLettersCharacteristic extends BaseCharacteristic
{

    /** @inheritDoc */
    public function generateCharacters(int $length): string
    {
        return Str::upper(SafeGenerator::letters($length));
    }

}
