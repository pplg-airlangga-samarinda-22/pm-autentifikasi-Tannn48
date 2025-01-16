<?php
require "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nik = $_POST['nik'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // Query untuk memeriksa login
    $sql = "SELECT * FROM masyarakat WHERE nik=? AND username=? AND password=?";
    $row = $koneksi->execute_query($sql, [$nik, $username, $password]);

    if (mysqli_num_rows($row) == 1) {
        $user = mysqli_fetch_assoc($row);
        session_start();
        $_SESSION['nik'] = $user['nik'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Redirect berdasarkan peran
        if ($user['role'] === 'admin') {
            header("location:admin_dashboard.php");
        } else {
            header("location:index.php");
        }
    } else {
        echo "<script>alert('Gagal Login!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
</head>

<body>
    <form action="" method="post" class="form-login">
        <p>Silahkan Login Sebagai Admin</p>
        <div class="form-item">
            <label for="nik">NIK</label>
            <input type="text" name="nik" id="nik" required>
        </div>
        <div class="form-item">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="form-item">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Login</button>
        <a href="register.php">Register</a>
    </form>
</body>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: #f9f9f9;
        }
        .form-item {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
        .register-link {
            margin-top: 15px;
            display: block;
        }
    </style>
</head>


</html>

</html>
