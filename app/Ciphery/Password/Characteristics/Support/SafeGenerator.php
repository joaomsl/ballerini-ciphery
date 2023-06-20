<?php

declare(strict_types=1);

namespace App\Ciphery\Password\Characteristics\Support;

use Illuminate\Support\Str;

class SafeGenerator
{

    public const LETTERS = 'abcdefghijklmnopqrstuvwxyz';
    public const NUMBERS = '0123456789';
    public const SYMBOLS = '"\'!@#$%&*()-_=+{[`´^~}]<,>.:;?/\\|';

    /**
     * @param int $length
     * @return string
     */
    protected static function generate(string $chars, int $length): string
    {
        $lastCharIndex = Str::length($chars) - 1;

        $result = '';
        $lastSelectedCharIndex = null;

        do {
            $index = mt_rand(0, $lastCharIndex);
            if($lastSelectedCharIndex === $index) {
                continue;
            }
            $lastSelectedCharIndex = $index;

            $result .= $chars[$index];
        } while(Str::length($result) < $length);

        return $result;
    }


    /**
     * @param int $length
     * @return string
     */
    public static function letters(int $length): string
    {
        return self::generate(self::LETTERS, $length);
    }

    /**
     * @param int $length
     * @return string
     */
    public static function numbers(int $length): string
    {
        return self::generate(self::NUMBERS, $length);
    }

    /**
     * @param int $length
     * @return string
     */
    public static function symbols(int $length): string
    {
        return self::generate(self::SYMBOLS, $length);
    }

}
