<?php
    session_start();
    require_once "koneksi.php";

    // Pastikan hanya admin yang bisa mengakses halaman ini
    if ($_SESSION['role'] !== 'admin') {
        header("location:login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard Admin</title>
</head>
<body>
    <h1>Selamat datang di Dashboard Admin</h1>
    <nav>
        <a href="admin_dashboard.php">Dashboard</a>
        <a href="manage_users.php">Kelola Pengguna</a>
        <a href="logout.php">Logout</a>
    </nav>
</body>
</html>
