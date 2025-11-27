<?php
include "koneksi.php";

if(isset($_POST['daftar'])){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Simpan ke database
    $query = "INSERT INTO users (nama, username, password) VALUES ('$nama','$username','$password')";

    if($koneksi->query($query)){
        echo "<script>
                alert('Registrasi berhasil!');
                window.location='login.php';
              </script>";
    } else {
        echo "<script>
                alert('Username sudah digunakan!');
                window.location='register.php';
              </script>";
    }
} else {
    header("Location: register.php");
}
?>
