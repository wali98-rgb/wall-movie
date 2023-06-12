<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- My CSS -->
    <link rel="stylesheet" href="../../css/st.css">
    <link rel="stylesheet" href="../../css/login.css">

    <!-- Font Awesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,400;0,600;1,100;1,200;1,400;1,600&display=swap" rel="stylesheet">

    <!-- Feather Icon -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Icon App -->
    
    <title>Login Page | Wall Movie</title>
</head>
<body>
    <!-- Navbar Start -->
    <?php
        include('../../partials/user/navbar.php')
    ?>
    <!-- Navbar End -->

    <!-- Cek Login -->
    <?php
        // session_start();
        // if ($_SESSION['status'] != "login") {
        //     header('location:login.php');
        // } else if ($_SESSION['status'] = "login" && $_SESSION['level'] = "admin") {
        //     header('location:../../pages/home.php');
        // } else if ($_SESSION['status'] = "login" && $_SESSION['level'] = "user") {
        //     header('location:../../index.php');
        // }
    ?>

    <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "gagal") {
                echo "Login Gagal! Username atau Password salah!";
            } else if ($_GET['pesan'] == "logout") {
                echo "Kamu berhasil Logout";
            } else if ($_GET['pesan'] == "belum_login") {
                echo "Anda harus login dulu";
            }
        }
    ?>
    
    <!-- Login Start -->
    <div class="login">
        <div class="login-section">
            <h1 class="login-title">Login <span>| Page</span></h1>
            <form class="login-form" action="check-login.php" method="POST">
                <input class="form-input" type="text" name="username" id="" placeholder="Masukkan Username" autofocus required> <br>
                <input class="form-input" type="password" name="password" id="" placeholder="Masukkan Password" required> <br>
                <input class="form-submit" type="submit" name="login" id="" value="Sign In">
                <a href="../register/register.php" class="form-regis">Sign Out</a>
            </form>
        </div>
    </div>
    <!-- Login End -->

    <?php
        // if ($_GET['status'] == "login" && $_GET['level'] == "admin") {
        //     header('location:../../index.php');
        // } else if ($_GET['level'] == "user" && $_GET['status'] == "login") {
        //     header('location:../../index.php');
        // }
    ?>
    
    <!-- Feather Icon -->
    <script>
        feather.replace()
    </script>
</body>
</html>