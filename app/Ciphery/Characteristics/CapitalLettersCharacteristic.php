<?php

declare(strict_types=1);

namespace App\Ciphery\Characteristics;

use App\Ciphery\Support\SafeGenerator;
use Illuminate\Support\Str;

class CapitalLettersCharacteristic extends BaseCharacteristic
{

    /** @inheritDoc */
    public function generateCharacters(int $length): string
    {
        return Str::upper(SafeGenerator::letters($length));
    }

}
