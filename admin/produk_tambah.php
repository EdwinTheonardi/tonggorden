<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Manajemen Data Produk</h1>
<p class="mb-4">
    Halaman ini digunakan untuk mengelola data produk
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Produk</h6>
    </div>
    <form action="produk_insert.php" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label>Nomor Kode:</label>
                <input type="text" class="form-control" name="kode" required placeholder="Masukan nomor kode" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Kategori:</label>
                <select name="kategori" class="form-control">
                    <option value='Gorden'>Gorden</option>
                    <option value='Bahan'>Bahan</option>
                </select>
            </div>
            <div class="form-group">
                <label>Warna:</label>
                <select name="idwarna" class="form-control">
                    <?php 
                    $qry = mysqli_query($conn ,"SELECT * FROM warna");
                    while($row=mysqli_fetch_array($qry)) {
                        echo "<option value='$row[idwarna]'>$row[warna]</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Motif:</label>
                <select name="idmotif" class="form-control">
                    <?php 
                    $qry = mysqli_query($conn ,"SELECT * FROM motif");
                    while($row=mysqli_fetch_array($qry)) {
                        echo "<option value='$row[idmotif]'>$row[motif]</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Foto:<sup class="text-danger">*Ukuran foto 450 x 300</sup></label>
                <input type="file" class="form-control" name="foto">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" name="produkSave" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="dashboard.php?menu=produk" class="btn btn-warning">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>

        </div>
    </form>

</div>

</div>
