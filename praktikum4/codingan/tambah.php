<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pendaftaran</title>
</head>
<body>
<h2>Form Pendaftaran Les Bimbel</h2>
<form action="" method="post">
    Nama Siswa:<br>
    <input type="text" name="nama" required><br><br>
    Jenis Kelamin:<br>
    <select name="jk" required>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select><br><br>
    Alamat:<br>
    <textarea name="alamat" required></textarea><br><br>
    No HP:<br>
    <input type="text" name="no_hp" required><br><br>
    Program Bimbel:<br>
    <select name="id_program" required>
        <?php
        $program = mysqli_query($koneksi, "SELECT * FROM program_bimbel");
        while ($p = mysqli_fetch_assoc($program)) {
            echo "<option value='".$p['id_program']."'>".$p['nama_program']."</option>";
        }
        ?>
    </select><br><br>
    Tanggal Daftar:<br>
    <input type="date" name="tanggal" required><br><br>
    <input type="submit" name="simpan" value="Simpan">
</form>

<?php
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $id_program = $_POST['id_program'];
    $tanggal = $_POST['tanggal'];

    mysqli_query($koneksi, "INSERT INTO siswa (nama_siswa, jenis_kelamin, alamat, no_hp)
                            VALUES ('$nama','$jk','$alamat','$no_hp')");
    $id_siswa = mysqli_insert_id($koneksi);

    mysqli_query($koneksi, "INSERT INTO pendaftaran (id_siswa, id_program, tanggal_daftar)
                            VALUES ('$id_siswa','$id_program','$tanggal')");

    echo "<script>alert('Data berhasil disimpan');window.location='index.php';</script>";
}
?>
</body>
</html>
