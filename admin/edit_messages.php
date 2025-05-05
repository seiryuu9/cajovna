<?php
require_once __DIR__ . '/../classes/Database.php';
$db = new Database();
$conn = $db->getConnection();

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM formular WHERE id = ?");
$stmt->execute([$id]);
$message = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $meno = $_POST['meno'];
    $email = $_POST['email'];
    $sprava = $_POST['sprava'];

    $update = $conn->prepare("UPDATE formular SET meno = ?, email = ?, sprava = ? WHERE id = ?");
    $update->execute([$meno, $email, $sprava, $id]);
    header("Location: messages.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="sk">
<?php include_once '../parts/head.php'; ?>
<body class="<?php include_once '../parts/theme-handler.php'; echo $themeClass; ?>">
<?php include_once '../parts/nav.php'; ?>

<div class="container py-5">
    <h1 class="mb-4">Upraviť správu</h1>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Meno</label>
            <input type="text" name="meno" class="form-control" value="<?= htmlspecialchars($message['meno']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($message['email']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Správa</label>
            <textarea name="sprava" class="form-control" rows="4" required><?= htmlspecialchars($message['sprava']) ?></textarea>
        </div>
        <button type="submit" class="btn btn-success">Uložiť zmeny</button>
        <a href="messages.php" class="btn btn-secondary">Späť</a>
    </form>
</div>

<?php include_once '../parts/footer.php'; ?>
</body>
</html>
