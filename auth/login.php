<?php
require '../service/connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'role' => $user['role']
        ];
        if ($user['role'] === 'admin') {
            header("Location: ../resources/admin/index.php");
        } else {
            header("Location: ../index.php");
        }
        exit;
    } else {
        $_SESSION['error'] = "Email atau password salah.";
        header("Location: ../index.php");  // Redirect kembali ke halaman login
        exit;
    }
}
