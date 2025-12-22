<?php
require_once __DIR__ . '/vendor/autoload.php';
include 'koneksi.php';

$id = $_GET['id'];
$q = mysqli_query($conn, "SELECT * FROM karyawan WHERE id='$id'");
$d = mysqli_fetch_assoc($q);

$total = $d['gaji_pokok'] + $d['tunjangan'] - $d['potongan'];

$html = '
<h2 style="text-align:center">SLIP GAJI</h2>
<hr>
<p>Nama : '.$d['nama'].'</p>
<p>Jabatan : '.$d['jabatan'].'</p>

<table border="1" width="100%" cellpadding="5">
<tr>
<th>Gaji Pokok</th>
<th>Tunjangan</th>
<th>Potongan</th>
<th>Total</th>
</tr>
<tr>
<td>Rp '.number_format($d['gaji_pokok']).'</td>
<td>Rp '.number_format($d['tunjangan']).'</td>
<td>Rp '.number_format($d['potongan']).'</td>
<td><b>Rp '.number_format($total).'</b></td>
</tr>
</table>
';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();