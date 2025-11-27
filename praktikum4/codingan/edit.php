<?php
include "koneksi.php";
$id = $_GET['id'];

$data = mysqli_fetch_assoc(mysqli_query($koneksi, "
    SELECT p.*, s.*, b.nama_program 
    FROM pendaftaran p
    JOIN siswa s ON p.id_siswa = s.id_siswa
    JOIN program_bimbel b ON p.id_program = b.id_program
    WHERE p.id_pendaftaran='$id'
"));
?>

<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Edit Data</title></head>
<body>
<h2>Edit Data Pendaftaran</h2>
<form method="post">
    Nama Siswa:<br>
    <input type="text" name="nama" value="<?= $data['nama_siswa'] ?>"><br><br>
    Jenis Kelamin:<br>
    <select name="jk">
        <option <?= $data['jenis_kelamin']=='Laki-laki'?'selected':'' ?>>Laki-laki</option>
        <option <?= $data['jenis_kelamin']=='Perempuan'?'selected':'' ?>>Perempuan</option>
    </select><br><br>
    No HP:<br>
    <input type="text" name="no_hp" value="<?= $data['no_hp'] ?>"><br><br>
    Status:<br>
    <select name="status">
        <option <?= $data['status']=='Aktif'?'selected':'' ?>>Aktif</option>
        <option <?= $data['status']=='Selesai'?'selected':'' ?>>Selesai</option>
        <option <?= $data['status']=='Batal'?'selected':'' ?>>Batal</option>
    </select><br><br>
    <input type="submit" name="update" value="Update">
</form>

<?php
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $no_hp = $_POST['no_hp'];
    $status = $_POST['status'];

    mysqli_query($koneksi, "UPDATE siswa SET 
        nama_siswa='$nama',
        jenis_kelamin='$jk',
        no_hp='$no_hp'
        WHERE id_siswa='".$data['id_siswa']."'");

    mysqli_query($koneksi, "UPDATE pendaftaran SET 
        status='$status'
        WHERE id_pendaftaran='$id'");

    echo "<script>alert('Data berhasil diupdate');window.location='index.php';</script>";
}
?>
</body>
</html>
