
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Manajemen Data Motif</h1>
<p class="mb-4">
    Halaman ini digunakan untuk mengelola data motif
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Motif</h6>
    </div>
    <form action="motif_insert.php" method="post">
        <div class="card-body">
            <div class="form-group">
                <label>Motif:</label>
                <input type="text" class="form-control" name="motif" required placeholder="Masukan motif" autocomplete="off">
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="dashboard.php?menu=motif" class="btn btn-warning">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>

        </div>
    </form>

</div>

</div>

