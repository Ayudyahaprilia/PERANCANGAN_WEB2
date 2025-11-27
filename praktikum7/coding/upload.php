<!doctype html>
<a class="navbar-brand" href="index.php">Photo Gallery</a>
</div>
</nav>


<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card shadow-sm">
<div class="card-body">
<h4 class="card-title">Form Upload Foto</h4>
<form action="proses.php" method="post" enctype="multipart/form-data">
<div class="mb-3">
<label for="nama" class="form-label">Nama</label>
<input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama" required>
</div>
<div class="mb-3">
<label for="foto" class="form-label">Pilih Foto (jpg, jpeg, png, gif) - max 2MB</label>
<input type="file" name="foto" id="foto" class="form-control" accept="image/*" required>
</div>
<div class="d-flex justify-content-between">
<a href="index.php" class="btn btn-secondary">Kembali</a>
<button type="submit" class="btn btn-primary">Simpan</button>
</div>
</form>
</div>
</div>


<div class="mt-3 text-muted small">
Sistem ini menyimpan file di folder <code>/gambar</code> dan metadata di database.
</div>
</div>
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

