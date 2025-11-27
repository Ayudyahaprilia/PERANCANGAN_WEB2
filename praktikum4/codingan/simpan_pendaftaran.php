<?php
include "koneksi.php";

// Ambil data dari form
$nama = $_POST['nama_siswa'];
$jk = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$id_program = $_POST['id_program'];
$tanggal_daftar = $_POST['tanggal_daftar'];

// Simpan ke tabel siswa
mysqli_query($koneksi, "INSERT INTO siswa (nama_siswa, jenis_kelamin, alamat, no_hp)
                        VALUES ('$nama', '$jk', '$alamat', '$no_hp')");

// Ambil ID siswa terakhir yang baru dimasukkan
$id_siswa = mysqli_insert_id($koneksi);

// Simpan ke tabel pendaftaran
$sql = "INSERT INTO pendaftaran (id_siswa, id_program, tanggal_daftar)
        VALUES ('$id_siswa', '$id_program', '$tanggal_daftar')";

if (mysqli_query($koneksi, $sql)) {
    echo "<h3>Pendaftaran berhasil!</h3>";
    echo "<a href='tampil_pendaftaran.php'>Lihat Data Pendaftar</a>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}
?>
