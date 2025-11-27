<?php
include "koneksi.php";
$id = $_GET['id'];

// Ambil id_siswa supaya bisa dihapus dari tabel siswa juga
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT id_siswa FROM pendaftaran WHERE id_pendaftaran='$id'"));
$id_siswa = $data['id_siswa'];

// Hapus dari tabel pendaftaran dulu (karena foreign key)
mysqli_query($koneksi, "DELETE FROM pendaftaran WHERE id_pendaftaran='$id'");
mysqli_query($koneksi, "DELETE FROM siswa WHERE id_siswa='$id_siswa'");

header("Location: index.php");
?>
