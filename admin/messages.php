<?php

require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/Admin.php';

use cajovna\classes\Admin;
use cajovna\classes\Database;

Admin::check();

$db = new Database();
$conn = $db->getConnection();

$stmt = $conn->query("SELECT * FROM formular ORDER BY id"); //CRUD - read
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC); //zobrazi vsetky spravy v asociativnom poli

$stmtNewsletter = $conn->query("SELECT id, email FROM newsletter ORDER BY id");
$subscribers = $stmtNewsletter->fetchAll(PDO::FETCH_ASSOC);
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
            <?php foreach ($messages as $msg): ?> <!--msg je jeden riadok-->
                <tr>
                    <td><?= $msg['id'] ?></td>
                    <td><?= htmlspecialchars($msg['meno']) ?></td>
                    <td><?= htmlspecialchars($msg['email']) ?></td>
                    <td><?= nl2br(htmlspecialchars($msg['sprava'])) ?></td>
                    <td>
                        <a href="edit_messages.php?id=<?= $msg['id'] ?>" class="btn btn-sm btn-warning">Upraviť</a>
                        <a href="delete_messages.php?id=<?= $msg['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Naozaj chcete túto správu vymazať?')">Vymazať</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<div class="container py-5">
    <h2 class="mb-4">Zoznam prihlásených na newsletter</h2>

    <?php if (empty($subscribers)): ?>
        <p>Žiadny používateľ sa zatiaľ neprihlásil na odber.</p>
    <?php else: ?>
        <table class="table table-bordered table-hover">
            <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Akcie</th> <!-- Nový stĺpec -->
            </tr>
            </thead>
            <tbody>
            <?php foreach ($subscribers as $subscriber): ?>
                <tr>
                    <td><?= $subscriber['id'] ?></td>
                    <td><?= htmlspecialchars($subscriber['email']) ?></td>
                    <td>
                        <a href="delete_newsletter.php?id=<?= $subscriber['id'] ?>" class="btn btn-sm btn-danger"
                           onclick="return confirm('Naozaj chcete odberateľa vymazať?')">Vymazať</a>
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
