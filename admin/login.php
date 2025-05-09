<?php
session_start();
require_once __DIR__ . '/../classes/Admin.php';
use cajovna\classes\Admin;

    $error = '';
// skontroluj, ci bola form odoslana postom
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? ''; //ak nie je nastaveny, prazdny retazec
    $password = $_POST['password'] ?? ''; //name z form
    $error = Admin::login($username, $password);
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
