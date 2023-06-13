<?php
session_start();

include "../config/connection.php";

if(isset($_SESSION["login"])) {
    header("Location: ../admin/dashboard.php");
    exit;
}


if (isset($_POST['login-button'])) {
    
    $username = mysqli_real_escape_string($conn, ($_POST["username"]));
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    if(mysqli_num_rows($result) > 0) {

        // cek password
        $row = mysqli_fetch_assoc($result);

        // jika password sama
        if ( password_verify($password, $row["password"]) ) {

            // set session
            $_SESSION["login"] = true;
            $_SESSION["username"] = $username;

            // Pindahkan ke halaman home
            header("Location: ../admin/dashboard.php");
            exit;

        } else {
            
            $error[] = 'Incorrect username or password';

        }
    } else {

    // jika username tidak sama
    $error[] = 'Incorrect username or password';

    }
}

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

        <!-- Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

    </head>
    <body class="login-body">

        <section class="login-section d-flex">
            <div class="login-left w-100 h-100">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-sm-8 col-md-3">
                        <div class="login-header">
                            <h1>Selamat datang</h1>
                        </div>

                        <div class="login-form">
                            
                            <form action="" method="post">
                                
                                <label for="username" class="form-label">Username</label>
                                <input type="username" class="username form-control" name="username" id="username" required autocomplete="off" placeholder="Masukkan username anda">

                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="password form-control" name="password" id="password" required autocomplete="off" placeholder="Masukkan password anda">
                                
                                <?php
                                if(isset($error)) {
                                    foreach($error as $error){
                                        echo '<span class="error-register-message" id="error-register-message" style="color: red;">'.$error.'</span>';
                                        echo '<br>';
                                    };
                                };
                                ?>
                                
                                <button class="login" name="login-button" id="register-button">Login</button>

                            </form>
                        </div>
                    </div>
                </div>
                
            </div>

        </section>
        
        
        <!-- Font Awesome Kit -->
        <script src="https://kit.fontawesome.com/178b5bff75.js" crossorigin="anonymous"></script>

        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        


    </body>
</html>