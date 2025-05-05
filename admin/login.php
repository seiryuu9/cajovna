<?php

session_start();
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hardcoded login (replace with database if needed)
    $validUsername = 'admin';
    $validPassword = password_hash('admin123', PASSWORD_DEFAULT); // Hashed password // You can hash this for better security

    if ($username === $validUsername && password_verify($password, $validPassword)) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: messages.php');
        exit;
    } else {
        $error = 'Nesprávne meno alebo heslo.';
    }
}
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
    <h2 class="text-center mb-4">Prihlásenie admina</h2>
    <?php if ($error): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form method="post" class="mx-auto" style="max-width: 400px;">
        <div class="mb-3">
            <label for="username" class="form-label">Používateľské meno</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Heslo</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Prihlásiť sa</button>
    </form>
</div>
<?php include_once '../parts/footer.php'; ?>
</body>
</html>
