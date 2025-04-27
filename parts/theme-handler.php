<?php
session_start();
require_once 'classes/Theme.php';

use themeN\Theme;

// Toggle theme if requested
if (isset($_GET['toggle_theme'])) {
    Theme::toggleTheme();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$themeClass = Theme::applyThemeClass();
?>