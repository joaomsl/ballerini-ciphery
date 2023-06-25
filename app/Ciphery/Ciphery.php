<?php

declare(strict_types=1);

namespace App\Ciphery;

use App\Ciphery\Contracts\Characteristic;
use Illuminate\Support\Str;

class Ciphery
{

    public const MIN_LENGTH = 4;
    public const MAX_LENGTH = 64;

    /** @param Characteristic[] $characteristics */
    public function __construct(protected array $characteristics)
    {}

    /**
     * @param int $length
     * @return string
     */
    public function generatePassword(int $length): string
    {
        $perCharacteristic = max(1, intval($length / count($this->characteristics)));

        $password = '';

        do {
            foreach($this->characteristics as $ch) {
                $password = $ch->generateCharacters($perCharacteristic) . $password;
            }
        } while(Str::length($password) < $length);

        return Str::substr(str_shuffle($password), 0, $length);
    }

}
