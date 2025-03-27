<?php
// PDO databázové pripojenie
$host = "localhost";
$dbname = "cajovna";
$port = 3306;
$username = "root";
$password = "";


// Pripojenie PDO
try {
    $conn = new PDO('mysql:host='.$host.';dbname='.$dbname.";port=".$port, $username,
        $password);
} catch (PDOException $e) {
    die("Chyba pripojenia: " . $e->getMessage());
}

// Získanie údajov z formulára
$mail = $_POST["newsletterEmail"];

// SQL príkaz INSERT
$sql = "INSERT INTO newsletter (email) 
    VALUE ('".$mail."')";
$statement = $conn->prepare($sql);
try {
    $insert = $statement->execute();
    header("Location: http://localhost/cajovna/thankyou.php"); // THANK YOU STRANKA
    return $insert;
} catch (\Exception $exception) {
    return false;
}

// Zatvorenie pripojenia
$conn = null;