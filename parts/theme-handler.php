
<?php
session_start();
require_once 'classes/Theme.php';

use themeN\Theme;

// Save id if available
if (isset($_GET['id'])) {
    $_SESSION['saved_id'] = intval($_GET['id']);
}

// Toggle theme if requested
if (isset($_GET['toggle_theme'])) {
    Theme::toggleTheme(); //mozem to pouzit, lebo je staticka, inak $theme = new Theme(); $theme->toggleTheme(); teda teraz nemusim vytvarat instanciu triedy


    if (basename($_SERVER['PHP_SELF']) === 'tea.php' && isset($_SESSION['saved_id'])) {
        $savedId = $_SESSION['saved_id'];
        unset($_SESSION['saved_id']); // Clear it after use
        header("Location: tea.php?id=" . $savedId);
    } else {
        header("Location: " . $_SERVER['PHP_SELF']); //zmaze z url toggle theme a redirectne (superglobalna premenna, obsahuje info), header odosiela http hlavicky
    }
    exit;
}

$themeClass = Theme::applyThemeClass();
?>

