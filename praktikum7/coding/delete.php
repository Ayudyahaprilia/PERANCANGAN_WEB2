<?php
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


if (!in_array($ext, $allowed)) {
die('Tipe file tidak diizinkan. <a href="upload.php">Kembali</a>');
}


if ($file['size'] > $maxSize) {
die('Ukuran file melebihi batas. Maks 2MB. <a href="upload.php">Kembali</a>');
}


// generate nama file unik
$newName = bin2hex(random_bytes(8)) . '.' . $ext;


// pastikan folder ada
if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);


$dest = $uploadDir . $newName;
if (!move_uploaded_file($file['tmp_name'], $dest)) {
die('Gagal memindahkan file. <a href="upload.php">Kembali</a>');
}


// simpan ke database (prepared statement)
$stmt = $koneksi->prepare('INSERT INTO namasiswa (nama, foto) VALUES (?, ?)');
$stmt->bind_param('ss', $nama, $newName);
if ($stmt->execute()) {
header('Location: index.php');
exit;
} else {
// hapus file bila gagal simpan db
@unlink($dest);
die('Gagal menyimpan data. ' . $koneksi->error);
}
}


http_response_code(405);
?>