<?php
$conn = mysqli_connect("localhost", "root", "", "db_gaji");
if (!$conn) {
    die("Koneksi gagal");
}