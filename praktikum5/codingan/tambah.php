<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Pendaftar</title>
<style>
    body { font-family: Arial; background: #f2f5f7; padding: 20px; }
    form { background: white; padding: 20px; width: 400px; margin: auto;
           box-shadow: 0 0 10px rgba(0,0,0,0.1); border-radius: 8px; }
    h2 { text-align: center; }
    input, select, textarea {
        width: 100%; padding: 8px; margin-bottom: 12px; border-radius: 5px;
        border: 1px solid #ccc;
    }
    .btn {
        background: #00a8ff; padding: 10px; color: white; border: none;
        width: 100%; border-radius: 6px; font-weight: bold;
    }
</style>
</head>
<body>

<h2>Tambah Pendaftar Les</h2>

<form action="" method="post">
    Nama Siswa:
    <input type="text" name="nama" required>

    Jenis Kelamin:
    <select name="jk">
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>

    Alamat:
    <textarea name="alamat" required></textarea>

    No HP:
    <input type="text" name="no_hp" required>

    Program Bimbel:
    <select name="id_program">
        <?php
        $prg = mysqli_query($koneksi, "SELECT * FROM program_bimbel");
        while ($p = mysqli_fetch_assoc($prg)) {
            echo "<option value='".$p['id_program']."'>".$p['nama_program']."</option>";
        }
        ?>
    </select>

    Tanggal Daftar:
    <input type="date" name="tanggal" required>

    <button class="btn" name="simpan">SIMPAN</button>
</form>

<?php
if (isset($_POST['simpan'])) {
    mysqli_query($koneksi, "INSERT INTO siswa (nama_siswa, jenis_kelamin, alamat, no_hp)
        VALUES ('".$_POST['nama']."','".$_POST['jk']."','".$_POST['alamat']."','".$_POST['no_hp']."')");

    $id_siswa = mysqli_insert_id($koneksi);

    mysqli_query($koneksi, "INSERT INTO pendaftaran (id_siswa, id_program, tanggal_daftar)
        VALUES ('$id_siswa','".$_POST['id_program']."','".$_POST['tanggal']."')");

    echo "<script>alert('Pendaftaran Berhasil!');window.location='index.php';</script>";
}
?>
</body>
</html>
