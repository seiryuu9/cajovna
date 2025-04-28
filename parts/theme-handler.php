<?php
session_start();
require_once 'classes/Theme.php';

use themeN\Theme;

// Toggle theme if requested
if (isset($_GET['toggle_theme'])) {
    Theme::toggleTheme(); //mozem to pouzit, lebo je staticka, inak $theme = new Theme(); $theme->toggleTheme(); teda teraz nemusim vytvarat instanciu triedy
    header("Location: " . $_SERVER['PHP_SELF']); //zmaze z url toggle theme a redirectne (superglobalna premenna, obsahuje info), header odosiela http hlavicky
    exit;
}

$themeClass = Theme::applyThemeClass();
?>