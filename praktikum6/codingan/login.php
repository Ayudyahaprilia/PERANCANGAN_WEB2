<?php
session_start();
include "koneksi.php";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = $koneksi->query("SELECT * FROM users WHERE username='$username'");

    if($data->num_rows > 0){
        $user = $data->fetch_assoc();

        if(password_verify($password, $user['password'])){
            $_SESSION['user'] = $user;
            header("Location: dashboard.php");
            exit;
        } else {
            echo "<script>alert('Password salah!')</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan!')</script>";
    }
}
?>
<link rel="stylesheet" href="style.css">

<div class='card'>
    <h2>Login</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button name="login">Masuk</button>
    </form>
    <p>Belum punya akun? <a href="register.php">Register</a></p>
</div>
