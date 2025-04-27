<?php
require_once __DIR__ . '/../classes/Database.php'; // Include the Database class

// Create an instance of the Database class
$db = new Database();

// Get the PDO connection
$conn = $db->getConnection();

// Získanie údajov z formulára
$mail = $_POST["newsletterEmail"];

// SQL príkaz INSERT
$sql = "INSERT INTO newsletter (email) 
    VALUES ('".$mail."')";
$statement = $conn->prepare($sql); //uzamkne strukturu tabulky, takze sa tam nedostane neziadany kod (placeholders su este bezpecnejsie)
try {
    $insert = $statement->execute();
    header("Location: http://localhost/cajovna/thankyou.php"); // THANK YOU STRANKA
    return $insert;
} catch (PDOException $exception) {
    return false;
}

// Zatvorenie pripojenia
$conn = null;