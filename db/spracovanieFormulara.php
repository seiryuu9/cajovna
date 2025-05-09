<?php
require_once __DIR__ . '/../classes/Database.php'; // folder o jeden vyssie

use cajovna\classes\Database;

$db = new Database();

$conn = $db->getConnection();

// ziskanie udajov z formulara (name v html)
$meno = $_POST["meno"];
$email = $_POST["email"];
$sprava = $_POST["sprava"];

// CRUD -  create
$sql = "INSERT INTO formular (meno, email, sprava) 
        VALUES (:meno, :email, :sprava)"; //placeholder na preventnutie SQL injection

$statement = $conn->prepare($sql);

try {
    $statement->bindParam(':meno', $meno, PDO::PARAM_STR); //parameter je string
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':sprava', $sprava, PDO::PARAM_STR);

    $insert = $statement->execute();
    header("Location: http://localhost/cajovna/thankyou.php"); // THANK YOU STRANKA
    exit();
} catch (PDOException $e) {
    echo $e->getMessage();
    exit();
}

// Zatvorenie pripojenia - zatvori sa automaticky exitom
//$conn = null;
