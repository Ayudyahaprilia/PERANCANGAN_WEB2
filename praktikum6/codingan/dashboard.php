<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];
?>
<link rel="stylesheet" href="style.css">

<div class='card'>
    <h2>Selamat Datang, <?php echo $user['nama']; ?>!</h2>
    <p>Anda berhasil login 🎉</p>

    <button onclick="window.location='logout.php'">Logout</button>
</div>
