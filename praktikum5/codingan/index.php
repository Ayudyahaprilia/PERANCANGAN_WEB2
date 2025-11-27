<?php
include "koneksi.php";

$result = mysqli_query($koneksi, "
    SELECT p.id_pendaftaran, s.nama_siswa, s.jenis_kelamin, s.no_hp, 
           b.nama_program, p.tanggal_daftar, p.status
    FROM pendaftaran p
    JOIN siswa s ON p.id_siswa = s.id_siswa
    JOIN program_bimbel b ON p.id_program = b.id_program
    ORDER BY p.id_pendaftaran DESC
");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Pendaftaran Les Bimbel</title>
<style>
    body { font-family: Arial, sans-serif; background: #f2f5f7; padding: 20px; }
    h2 { text-align: center; color: #333; }
    .btn {
        background: #00a8ff; padding: 10px 16px; color: white; text-decoration: none;
        border-radius: 6px; font-weight: bold;
    }
    .btn:hover { background: #007acc; }
    table {
        width: 100%; border-collapse: collapse; margin-top: 20px;
        background: white; box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
    }
    th, td { padding: 12px; border-bottom: 1px solid #ddd; text-align: left; }
    th { background: #00a8ff; color: white; }
    tr:hover { background: #f1faff; }
    .aksi a {
        padding: 6px 10px; border-radius: 4px; color: white; text-decoration: none;
    }
    .edit { background: #f39c12; }
    .hapus { background: #e74c3c; }
</style>
</head>
<body>

<h2>Pendaftaran Les Bimbel</h2>
<a href="tambah.php" class="btn">+ Tambah Pendaftar Baru</a>

<table>
    <tr>
        <th>No</th>
        <th>Nama Siswa</th>
        <th>Jenis Kelamin</th>
        <th>No HP</th>
        <th>Program</th>
        <th>Tanggal Daftar</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <?php
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>".$no++."</td>
                <td>".$row['nama_siswa']."</td>
                <td>".$row['jenis_kelamin']."</td>
                <td>".$row['no_hp']."</td>
                <td>".$row['nama_program']."</td>
                <td>".$row['tanggal_daftar']."</td>
                <td>".$row['status']."</td>
                <td class='aksi'>
                    <a href='edit.php?id=".$row['id_pendaftaran']."' class='edit'>Edit</a>
                    <a href='hapus.php?id=".$row['id_pendaftaran']."' class='hapus' onclick='return confirm(\"Hapus data ini?\")'>Hapus</a>
                </td>
              </tr>";
    }
    ?>
</table>

</body>
</html>
