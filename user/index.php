<!-- <?php
session_start();

if(isset($_SESSION["login"])) {
    header("Location: ../admin/dashboard.php");
    exit;
}

?> -->


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tong Gorden</title>
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../assets/css/userstyle.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">
                    <img src="../assets/img/logo.png">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <form class="d-flex">
                        <a href="../login/login.php" class="btn btn-outline-dark">
                            <i class="fas fa-user"></i> Login
                        </a>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5" style="background-image: url(../assets/img/users-bg-1.jpg); background-size: cover;">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Tong Gorden</h1>
                    <p class="lead fw-normal text-white-50 mb-0"></p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    
                    <?php 

                    include "../config/connection.php";

                    $no  = 1;
                    $sql = "SELECT * FROM produk LEFT JOIN warna USING(idwarna) LEFT JOIN motif USING(idmotif)";
                    $query = mysqli_query($conn, $sql);
                    while($row=mysqli_fetch_array($query))
                    {
                        $link_hapus = "produk_delete.php?id=$row[idproduk]";
                        $link_edit  = "dashboard.php?menu=produk&aksi=edit&id=$row[idproduk]";
                        $link_view = "view.php?id=$row[idproduk]";

                        $foto = "default.jpg";
                        if($row['foto'] != "") { $foto = $row['foto']; }
                        $link_foto  = "../images/produk/$foto";
                    ?> 

                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="<?=$link_foto;?>"/>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?=$row['kode'];?></h5>
                                    <!-- Product category-->
                                    <?=$row['kategori'];?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="<?= $link_view ?>">Lihat</a></div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        $no++;
                        }
                    ?>
                </div>
                
            </div>
            
        </section>

        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Tong Gorden 2023</p></div>
        </footer>

        <!-- Font Awesome Kit -->
        <script src="https://kit.fontawesome.com/178b5bff75.js" crossorigin="anonymous"></script>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
