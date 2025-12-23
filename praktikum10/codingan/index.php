<?php
include 'koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM karyawan");
?>

<!DOCTYPE html>
<html>
<head>
<title>Data Gaji</title>
</head>
<body>

<h2>Data Gaji Karyawan</h2>

<table border="1">
<tr>
<th>No</th>
<th>Nama</th>
<th>Jabatan</th>
<th>Aksi</th>
</tr>

<?php $no=1; while($row=mysqli_fetch_assoc($data)) { ?>
<tr>
<td><?= $no++ ?></td>
<td><?= $row['nama'] ?></td>
<td><?= $row['jabatan'] ?></td>
<td>
<a href="cetak_pdf.php?id=<?= $row['id'] ?>" target="_blank">
Cetak
</a>
</td>
</tr>
<?php } ?>

</table>

</body>
</html>