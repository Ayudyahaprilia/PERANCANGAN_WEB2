<?php
require 'koneksi.php';

// konfigurasi folder upload
$uploadDir = __DIR__ . '/gambar/';
$maxSize = 2 * 1024 * 1024; // 2MB
$allowed = ['jpg','jpeg','png','gif'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama = trim($_POST['nama'] ?? '');
    if ($nama === '') {
        die('Nama tidak boleh kosong. <a href="upload.php">Kembali</a>');
    }

    if (!isset($_FILES['foto']) || $_FILES['foto']['error'] !== UPLOAD_ERR_OK) {
        die('File gagal diupload. <a href="upload.php">Kembali</a>');
    }

    $file = $_FILES['foto'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    // cek ekstensi
    if (!in_array($ext, $allowed)) {
        die('Tipe file tidak diizinkan. <a href="upload.php">Kembali</a>');
    }

    // cek ukuran
    if ($file['size'] > $maxSize) {
        die('Ukuran file melebihi batas. Maks 2MB. <a href="upload.php">Kembali</a>');
    }

    // generate nama file unik
    $newName = bin2hex(random_bytes(8)) . '.' . $ext;

    // pastikan folder ada
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    // lokasi tujuan
    $dest = $uploadDir . $newName;

    // pindahkan file
    if (!move_uploaded_file($file['tmp_name'], $dest)) {
        die('Gagal memindahkan file.');
    }

    // simpan database
    $stmt = $koneksi->prepare("INSERT INTO namasiswa (nama, foto) VALUES (?, ?)");
    $stmt->bind_param('ss', $nama, $newName);
    $stmt->execute();

    header("Location: index.php");
    exit;
}
?>
