<?php
require 'koneksi.php';
// ambil data
$sql = "SELECT * FROM namasiswa ORDER BY id DESC";
$res = $koneksi->query($sql);
?>
<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Gallery Foto</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body{background:#f7fafc}
.card-img-top{object-fit:cover;height:180px}
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
<div class="container">
<a class="navbar-brand" href="#">Photo Gallery</a>
<div>
<a href="upload.php" class="btn btn-light">Upload Foto</a>
</div>
</div>
</nav>


<div class="container">
<div class="row g-3">
<?php while($row = $res->fetch_assoc()): ?>
<div class="col-sm-6 col-md-4 col-lg-3">
<div class="card shadow-sm">
<img src="gambar/<?php echo htmlspecialchars($row['foto']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['nama']); ?>">
<div class="card-body">
<h5 class="card-title mb-1"><?php echo htmlspecialchars($row['nama']); ?></h5>
<p class="card-text"><small class="text-muted">Uploaded: <?php echo $row['uploaded_at']; ?></small></p>
<div class="d-flex justify-content-between">
<a href="gambar/<?php echo rawurlencode($row['foto']); ?>" target="_blank" class="btn btn-sm btn-outline-primary">Lihat</a>
<a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus foto ini?');">Hapus</a>
</div>
</div>
</div>
</div>
<?php endwhile;?>


<?php if(!$res || $res->num_rows == 0): ?>
<div class="col-12">
<div class="alert alert-info">Belum ada foto. <a href="upload.php">Unggah sekarang</a>.</div>
</div>
<?php endif; ?>
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>