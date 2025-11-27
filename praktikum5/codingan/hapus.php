<?php
include "koneksi.php";
$id = $_GET['id'];

$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT id_siswa FROM pendaftaran WHERE id_pendaftaran='$id'"));
$id_siswa = $data['id_siswa'];

mysqli_query($koneksi, "DELETE FROM pendaftaran WHERE id_pendaftaran='$id'");
mysqli_query($koneksi, "DELETE FROM siswa WHERE id_siswa='$id_siswa'");

echo "<script>alert('Data berhasil dihapus');window.location='index.php';</script>";
?>
