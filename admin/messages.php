<?php
require_once 'authentication.php';
require_once __DIR__ . '/../classes/Database.php';

$db = new Database();
$conn = $db->getConnection();

// Načítanie všetkých správ
$stmt = $conn->query("SELECT * FROM formular ORDER BY id");
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="sk">

<?php
include_once '../parts/head.php';
include_once '../parts/nav.php';
include_once '../parts/theme-handler.php';
?>

<body class="<?php echo $themeClass; ?>">


<div class="container py-5">
    <h1 class="mb-4">Zoznam správ z formulára</h1>

    <?php if (empty($messages)): ?>
        <p>Žiadne správy zatiaľ neboli odoslané.</p>
    <?php else: ?>
        <table class="table table-bordered table-hover">
            <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Meno</th>
                <th>Email</th>
                <th>Správa</th>
                <th>Akcie</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($messages as $msg): ?>
                <tr>
                    <td><?= $msg['ID'] ?></td>
                    <td><?= htmlspecialchars($msg['meno']) ?></td>
                    <td><?= htmlspecialchars($msg['email']) ?></td>
                    <td><?= nl2br(htmlspecialchars($msg['sprava'])) ?></td>
                    <td>
                        <a href="edit_messages.php?id=<?= $msg['ID'] ?>" class="btn btn-sm btn-warning">Upraviť</a>
                        <a href="delete_messages.php?id=<?= $msg['ID'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Naozaj chceš túto správu vymazať?')">Vymazať</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php include_once '../parts/footer.php'; ?>
</body>
</html>
