<?php

declare(strict_types=1);

namespace App\Ciphery\Contracts;

interface Characteristic extends Option
{

    /**
     * @param int $length
     * @return string
     */
    public function generateCharacters(int $length): string;

}
