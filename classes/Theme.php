<?php

namespace cajovna\classes;

class Theme
{
    public static function toggleTheme(): void
    {
        // meni sa dark a light
        if ($_SESSION['theme'] === 'dark-theme') {
            $_SESSION['theme'] = 'light-theme';
        } else {
            $_SESSION['theme'] = 'dark-theme';
        }
    }

    public static function applyThemeClass(): string //napr class = dark-theme
    {
        return $_SESSION['theme'] ?? '';
    }

}