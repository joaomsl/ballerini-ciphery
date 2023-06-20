<?php

declare(strict_types=1);

namespace App\Ciphery\Password\Characteristics;

use App\Ciphery\Password\Characteristics\Support\SafeGenerator;

class SmallLettersCharacteristic extends BaseCharacteristic
{

    /** @inheritDoc */
    public function generateCharacters(int $length): string
    {
        return SafeGenerator::letters($length);
    }

}