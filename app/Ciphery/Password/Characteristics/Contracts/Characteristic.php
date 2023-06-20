<?php

declare(strict_types=1);

namespace App\Ciphery\Password\Characteristics\Contracts;

use App\Ciphery\Support\Contracts\Option;

interface Characteristic extends Option
{

    /**
     * @param int $length
     * @return string
     */
    public function generateCharacters(int $length): string;

}
