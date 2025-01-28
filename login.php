<?php
session_start();

// Periksa apakah pengguna sudah login
if (isset($_SESSION['user'])) {
    // Redirect ke halaman sesuai role
    if ($_SESSION['user']['role'] === 'admin') {
        header("Location: admin/index.php");
    } else if ($_SESSION['user']['role'] === 'user') {
        header("Location: index.php");
    } else {
        header("Location: login.php");
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Login</h2>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
        <?php endif; ?>
        <form method="POST" action="auth/login.php">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <p class="mt-3 text-center">Belum punya akun? <a href="register.php">Register</a></p>
    </div>
</body>

</html>