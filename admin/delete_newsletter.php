<?php
require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/Admin.php';

use cajovna\classes\Admin;
use cajovna\classes\Database;

Admin::check();

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $db = new Database();
    $conn = $db->getConnection();

    $stmt = $conn->prepare("DELETE FROM newsletter WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: messages.php");
exit;
