<?php
require_once __DIR__ . '/../classes/Database.php';

use cajovna\classes\Database;

$db = new Database();
$conn = $db->getConnection();

$mail = $_POST["newsletterEmail"];

if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) { //kontroluje ci je email validny
    echo "Neplatný email";
    exit();
}

$sql = "INSERT INTO newsletter (email) 
    VALUES (:mail)";
$statement = $conn->prepare($sql); //uzamkne strukturu tabulky, takze sa tam nedostane neziadany kod (placeholders su este bezpecnejsie)

try {
    $statement->bindParam(':mail', $mail, PDO::PARAM_STR);

    $insert = $statement->execute();
    header("Location: http://localhost/cajovna/thankyou.php"); // THANK YOU STRANKA
    exit();
} catch (PDOException $e) {
    if ($e->errorInfo[1] == 1062) {
        echo "Zadaný e-mail <strong>" . htmlspecialchars($mail) . "</strong> je už prihlásený k odberu.";
    } else {
    echo $e->getMessage();
}
    exit();
}
