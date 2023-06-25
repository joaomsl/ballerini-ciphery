<?php

declare(strict_types=1);

namespace App\Extra;

class Theme
{

    private const SESSION_KEY = 'web_theme';

    /**
     * @param string|null $theme
     * @return void
     */
    public static function storeClass(?string $theme): void
    {
        session()->put(self::SESSION_KEY, $theme);
    }

    /**
     * @return string|null
     */
    public static function getClass(): ?string
    {
        return session(self::SESSION_KEY);
    }

}
