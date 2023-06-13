<?php
$idproduk = mysqli_real_escape_string($conn, $_GET['id']);
$sql   = "SELECT * FROM produk WHERE idproduk='$idproduk' ";
$query = mysqli_query($conn, $sql);
$data  = mysqli_fetch_array($query);
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Manajemen Data Produk</h1>
    <p class="mb-4">
        Halaman ini digunakan untuk mengelola data produk
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Data Produk</h6>
        </div>
        <form action="produk_update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="idproduk" value="<?=$data['idproduk'];?>">
            <div class="card-body">
                <div class="form-group">
                    <label>Nomor Kode:</label>
                    <input type="text" class="form-control" name="kode" required placeholder="Masukan kode" value="<?=$data['kode'];?>" autocomplete="off">
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
                        $qry = mysqli_query($conn, "SELECT * FROM warna");
                        while($row=mysqli_fetch_array($qry)) {
                            $check = "";
                            if($data['idwarna'] == $row['idwarna']) { $check ="selected"; }

                            echo "<option $check value='$row[idwarna]'>$row[warna]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Motif:</label>
                    <select name="idmotif" class="form-control">
                        <?php 
                        $qry = mysqli_query($conn, "SELECT * FROM motif");
                        while($row=mysqli_fetch_array($qry)) {
                            $check = "";
                            if($data['idmotif'] == $row['idmotif']) { $check ="selected"; }

                            echo "<option $check value='$row[idmotif]'>$row[motif]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Foto:<sup class="text-danger">*Kosongkan jika tidak mengganti foto</sup></label>
                    <input type="file" class="form-control" name="foto">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="index.php?menu=produk" class="btn btn-warning">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>

            </div>
        </form>

    </div>

</div>

