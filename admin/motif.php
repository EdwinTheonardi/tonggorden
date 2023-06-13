<?php 
$aksi = isset($_GET['aksi'])?$_GET['aksi']:"";
if      ($aksi == "tambah") { include "motif_tambah.php"; }
else if ($aksi == "edit")   { include "motif_edit.php"; }
else {
?>
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Manajemen Data Motif</h1>
                    <p class="mb-4">
                        Halaman ini digunakan untuk mengelola data motif
                    </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Motif</h6>
                        </div>
                        <div class="card-body">
                            <a href="dashboard.php?menu=motif&aksi=tambah" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Tambah
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5">No</th>
                                            <th width="200">Motif</th>
                                            <th width="50">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $no  = 1;
                                    $sql = "SELECT * FROM motif";
                                    $query = mysqli_query($conn,$sql);
                                    while($row=mysqli_fetch_array($query))
                                    {
                                        $link_hapus = "motif_delete.php?id=$row[idmotif]";
                                        $link_edit  = "dashboard.php?menu=motif&aksi=edit&id=$row[idmotif]";
                                    ?>
                                        <tr>
                                            <td><?=$no;?></td>
                                            <td><?=$row['motif'];?></td>
                                            <td>
                                                <a href="<?=$link_edit;?>" class="btn btn-success">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button href="<?=$link_hapus;?>" onclick="openModal('<?= $link_hapus ?>')" class="btn btn-danger" data-toggle="modal" data-target="#motifDeleteConfirmModal">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php 
                                    $no++;
                                    }
                                    ?>
                                        
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                
                    
    <script>
        function openModal(linkHapus){
            $('#motifDeleteConfirmModal').modal('show');
            $('#link_hapus_motif').attr('href', linkHapus);
        }
    </script>

<?php 
}
?>