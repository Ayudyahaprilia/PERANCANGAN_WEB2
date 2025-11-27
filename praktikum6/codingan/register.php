<?php
include "koneksi.php";

if(isset($_POST['daftar'])){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (nama, username, password) 
              VALUES ('$nama','$username','$password')";

    if($koneksi->query($query)){
        echo "<script>alert('Registrasi berhasil!'); window.location='login.php'</script>";
    } else {
        echo "<script>alert('Username sudah digunakan!')</script>";
    }
}
?>
<link rel="stylesheet" href="style.css">

<div class='card'>
    <h2>Register</h2>
    <form method="POST">
        <input type="text" name="nama" placeholder="Nama Lengkap" required>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button name="daftar">Daftar</button>
    </form>
    <p>Sudah punya akun? <a href="login.php">Login</a></p>
</div>
