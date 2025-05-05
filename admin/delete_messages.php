<?php
require_once 'authentication.php';
require_once __DIR__ . '/../classes/Database.php';
$db = new Database();
$conn = $db->getConnection();

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM formular WHERE id = ?");
$stmt->execute([$id]);

header("Location: messages.php");
exit;
