<?php
session_start();

function checkRole($requiredRole)
{
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== $requiredRole) {
        header("Location: index.php");
        exit;
    } else {
        return true;
    }
}
