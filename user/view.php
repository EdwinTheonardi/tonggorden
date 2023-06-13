<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tonggorden</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
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
        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                <?php 

                include "../config/connection.php";

                $idview = mysqli_real_escape_string($conn, $_GET['id']);

                $sql = "SELECT * FROM produk LEFT JOIN warna USING(idwarna) LEFT JOIN motif USING(idmotif) WHERE idproduk = '$idview'";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($query);
                $foto = "default.jpg";
                if($row['foto'] != "") { $foto = $row['foto']; }
                $link_foto  = "../images/produk/$foto";

                ?> 
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?=$link_foto;?>"/></div>
                    <div class="col-md-6">
                        <div class="d-flex">
                            <a href="index.php" class="btn btn-dark flex-shrink-0" type="button" style="color: white; margin-bottom: 10px;">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                        <h1 class="display-5 fw-bolder"><?=$row['kode'];?></h1>
                        <div class="fs-5 mb-5">
                            <span class="text-decoration-line-through"></span>
                            <span><?=$row['kategori'];?></span>
                        </div>
                        <p class="lead">Warna: <?=$row['warna'];?>, Motif: <?=$row['motif'];?></p>
                        <div class="d-flex">
                            <button class="btn btn-outline-dark flex-shrink-0" type="button" onclick="openWhatsApp()">
                                <i class="fa-brands fa-whatsapp"></i>
                                Hubungi via WhatsApp
                            </button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Tonggorden &copy; Your Website 2023</p></div>
        </footer>

        <!-- Font Awesome Kit -->
        <script src="https://kit.fontawesome.com/178b5bff75.js" crossorigin="anonymous"></script>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

        <script>
        function openWhatsApp() {
            var phoneNumber = "6289620910999";
            var message = "Hello there, I am interested in your products";
            var url = "https://api.whatsapp.com/send?phone=" + phoneNumber + "&text=" + encodeURIComponent(message);
            window.open(url);
        }
        </script>
    </body>
</html>
