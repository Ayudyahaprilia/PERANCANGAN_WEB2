<?php
session_start();
include "koneksi.php";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = $koneksi->query("SELECT * FROM users WHERE username='$username'");

    if($data->num_rows > 0){
        $user = $data->fetch_assoc();

        // Validasi password
        if(password_verify($password, $user['password'])){
            $_SESSION['user'] = $user;
            header("Location: dashboard.php");
            exit;
        } else {
            echo "<script>
                    alert('Password salah!');
                    window.location='login.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Username tidak ditemukan!');
                window.location='login.php';
              </script>";
    }
} else {
    header("Location: login.php");
}
?>
