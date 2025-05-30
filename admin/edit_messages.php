<?php

require_once __DIR__ . '/../classes/Admin.php';

use cajovna\classes\Admin;

$message = Admin::editMessage($_GET['id'], $_POST ?? []); //get je v url, post v form
?>

<!DOCTYPE html>
<html lang="sk">

<?php
include_once '../parts/head.php';
include_once '../parts/nav.php';
include_once '../parts/theme_handler.php';
?>

<body class="<?php echo $themeClass; ?>">

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
