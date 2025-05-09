<?php
require_once __DIR__ . '/../classes/Database.php';

use cajovna\classes\Database;

$db = new Database();

$conn = $db->getConnection();

$mail = $_POST["newsletterEmail"];

// SQL príkaz INSERT
$sql = "INSERT INTO newsletter (email) 
    VALUES (:mail)";
$statement = $conn->prepare($sql); //uzamkne strukturu tabulky, takze sa tam nedostane neziadany kod (placeholders su este bezpecnejsie)

try {
    $statement->bindParam(':mail', $mail, PDO::PARAM_STR);

    $insert = $statement->execute();
    header("Location: http://localhost/cajovna/thankyou.php"); // THANK YOU STRANKA
    exit();
} catch (PDOException $e) {
    echo $e->getMessage();
    exit();
}
