<?php
include "koneksi.php";
$query = "
    SELECT p.id_pendaftaran, s.nama_siswa, s.jenis_kelamin, s.no_hp,
           b.nama_program, p.tanggal_daftar, p.status
    FROM pendaftaran p
    JOIN siswa s ON p.id_siswa = s.id_siswa
    JOIN program_bimbel b ON p.id_program = b.id_program
    ORDER BY p.id_pendaftaran DESC
";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pendaftaran Les Bimbel</title>
</head>
<body>
    <h2>Data Pendaftaran Les Bimbel</h2>
    <a href="tambah.php">+ Tambah Pendaftaran Baru</a>
    <br><br>
    <table border="1" cellpadding="8">
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
            echo "<tr>";
            echo "<td>".$no++."</td>";
            echo "<td>".$row['nama_siswa']."</td>";
            echo "<td>".$row['jenis_kelamin']."</td>";
            echo "<td>".$row['no_hp']."</td>";
            echo "<td>".$row['nama_program']."</td>";
            echo "<td>".$row['tanggal_daftar']."</td>";
            echo "<td>".$row['status']."</td>";
            echo "<td>
                    <a href='edit.php?id=".$row['id_pendaftaran']."'>Edit</a> |
                    <a href='hapus.php?id=".$row['id_pendaftaran']."' onclick='return confirm(\"Hapus data ini?\")'>Hapus</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
