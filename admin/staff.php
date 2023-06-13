<?php 
$aksi = isset($_GET['aksi'])?$_GET['aksi']:"";
if      ($aksi == "tambah") { include "staff_tambah.php"; }
else if ($aksi == "edit")   { include "staff_edit.php"; }
else {
?>
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Manajemen Staff</h1>
                    <p class="mb-4">
                        Halaman ini digunakan untuk mengelola staff
                    </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
                        </div>
                        <div class="card-body">
                            <a href="dashboard.php?menu=staff&aksi=tambah" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Tambah
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="50">No</th>
                                            <th width="150">Role</th>
                                            <th>Username</th>
                                            <th width="100">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $no  = 1;
                                    $sql = "SELECT * FROM users";
                                    $query = mysqli_query($conn, $sql);
                                    while($row=mysqli_fetch_array($query))
                                    {
                                        $link_hapus = "staff_delete.php?id=$row[idstaff]";
                                        $link_edit  = "dashboard.php?menu=staff&aksi=edit&id=$row[idstaff]";
                                    ?>
                                        <tr>
                                            <td><?=$no;?></td>
                                            <td><?=$row['role'];?></td>
                                            <td><?=$row['username'];?></td>
                                            <td>
                                                <button href="<?=$link_hapus;?>" onclick="openModal('<?= $link_hapus ?>')" class="btn btn-danger">
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
                        $('#staffDeleteConfirmModal').modal('show');
                        $('#link_hapus_staff').attr('href', linkHapus);
                    }
                </script>

<?php 
}
?>