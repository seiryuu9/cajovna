<?php

namespace themeN;

class Theme
{
    private const DEFAULT_THEME = 'light';
    private const SESSION_KEY = 'theme';

    public static function getCurrentTheme(): string
    {

        // Check session data for 'theme' and return it or use default
        return $_SESSION['theme'] ?? self::DEFAULT_THEME;
    }

    public static function toggleTheme(): void
    {
        // Toggle between light and dark themes
        if (isset($_SESSION['theme']) && $_SESSION['theme'] === 'dark-theme') {
            $_SESSION['theme'] = 'light-theme';  // Set it to light if it was dark
        } else {
            $_SESSION['theme'] = 'dark-theme';  // Set it to dark if it was light
        }
    }


    public static function applyThemeClass(): string
    {
        return $_SESSION['theme'] ?? '';
    }

}