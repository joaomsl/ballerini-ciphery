<?php

declare(strict_types=1);

namespace App\Extra;

class Theme
{

    private const SESSION_KEY = 'web_theme';

    public const SUPPORTED_THEMES = ['light', 'dark'];

    public static function store(string $theme): void
    {
        session()->put(self::SESSION_KEY, $theme);
    }

    public static function get(): string
    {
        return session(self::SESSION_KEY, 'light');
    }

}
