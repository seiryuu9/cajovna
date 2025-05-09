<?php

namespace cajovna\classes;

class Theme
{
    public static function toggleTheme(): void
    {
        // Toggle between light and dark themes
        if ($_SESSION['theme'] === 'dark-theme') {
            $_SESSION['theme'] = 'light-theme';  // Set it to light if it was dark
        } else {
            $_SESSION['theme'] = 'dark-theme';  // Set it to dark if it was light
        }
    }

    public static function applyThemeClass(): string //napr class = dark-theme
    {
        return $_SESSION['theme'] ?? '';
    }

}