<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'foto';


$koneksi = new mysqli($host, $user, $pass, $db);
if ($koneksi->connect_error) {
die('Koneksi gagal: ' . $koneksi->connect_error);
}
// set charset
$koneksi->set_charset('utf8mb4');
?>