
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Manajemen Data Warna</h1>
<p class="mb-4">
    Halaman ini digunakan untuk mengelola data warna
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Warna</h6>
    </div>
    <form action="warna_insert.php" method="post">
        <div class="card-body">
            <div class="form-group">
                <label>Warna:</label>
                <input type="text" class="form-control" name="warna" required placeholder="Masukan warna" autocomplete="off">
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="dashboard.php?menu=warna" class="btn btn-warning">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>

        </div>
    </form>

</div>

</div>

