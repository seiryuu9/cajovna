<?php
require_once __DIR__ . '/../classes/Database.php'; // Include the Database class

// Create an instance of the Database class
$db = new Database();

// Get the PDO connection
$conn = $db->getConnection();

// Získanie údajov z formulára (name v html)
$meno = $_POST["meno"];
$email = $_POST["email"];
$sprava = $_POST["sprava"];

// SQL príkaz INSERT
$sql = "INSERT INTO formular (meno, email, sprava) 
    VALUES ('".$meno."', '".$email."', '".$sprava."')"; //double quotes - premenne na nahradenie

$statement = $conn->prepare($sql);

try {
    $insert = $statement->execute();
    header("Location: http://localhost/cajovna/thankyou.php"); // THANK YOU STRANKA
    return $insert; //true
} catch (PDOException $exception) {
    return false;
}

// Zatvorenie pripojenia
$conn = null;
