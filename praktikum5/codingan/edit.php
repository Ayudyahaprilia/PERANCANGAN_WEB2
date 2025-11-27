<?php
include "koneksi.php";
$id = $_GET['id'];

$data = mysqli_fetch_assoc(mysqli_query($koneksi, "
    SELECT p.*, s.* 
    FROM pendaftaran p 
    JOIN siswa s ON p.id_siswa = s.id_siswa 
    WHERE p.id_pendaftaran='$id'
"));
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Data</title>
<style>
    body { font-family: Arial; background: #f2f5f7; padding: 20px; }
    form { background: white; padding: 20px; width: 400px; margin: auto;
           box-shadow: 0px 0px 10px rgba(0,0,0,0.1); border-radius: 8px; }
    h2 { text-align: center; }
    input, select, textarea {
        width:100%; padding:8px; margin-bottom:12px; border-radius:6px; border:1px solid #ccc;
    }
    .btn { background:#f39c12; padding:10px; color:white; border:none; width:100%; border-radius:5px; }
</style>
</head>
<body>

<h2>Edit Data Pendaftar</h2>

<form method="post">
    Nama:
    <input type="text" name="nama" value="<?= $data['nama_siswa'] ?>">

    Jenis Kelamin:
    <select name="jk">
        <option <?= $data['jenis_kelamin']=='Laki-laki'?'selected':'' ?>>Laki-laki</option>
        <option <?= $data['jenis_kelamin']=='Perempuan'?'selected':'' ?>>Perempuan</option>
    </select>

    No HP:
    <input type="text" name="no_hp" value="<?= $data['no_hp'] ?>">

    Status:
    <select name="status">
        <option <?= $data['status']=='Aktif'?'selected':'' ?>>Aktif</option>
        <option <?= $data['status']=='Selesai'?'selected':'' ?>>Selesai</option>
        <option <?= $data['status']=='Batal'?'selected':'' ?>>Batal</option>
    </select>

    <button class="btn" name="update">UPDATE</button>
</form>

<?php
if (isset($_POST['update'])) {
    mysqli_query($koneksi, "UPDATE siswa SET 
        nama_siswa='".$_POST['nama']."',
        jenis_kelamin='".$_POST['jk']."',
        no_hp='".$_POST['no_hp']."'
        WHERE id_siswa='".$data['id_siswa']."'");

    mysqli_query($koneksi, "UPDATE pendaftaran SET 
        status='".$_POST['status']."'
        WHERE id_pendaftaran='$id'");

    echo "<script>alert('Data berhasil diupdate!');window.location='index.php';</script>";
}
?>
</body>
</html>
