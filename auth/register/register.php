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

    <!-- Tambah User Start -->
    <?php
        include '../../connection/koneksi.php';
        
        if (isset($_POST['regis'])) {
            mysqli_query($con, "INSERT INTO user SET
                username = '$_POST[username]',
                password = '$_POST[password]',
                level = 'user'
            ");

            ?>

            <script>
                alert("Registrasi Berhasil!");
            </script>
            
            <?php
        }
    ?>
    <!-- Tambah User End -->
    
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
            <h1 class="login-title">Registration <span>| Page</span></h1>
            <form class="login-form" action="register.php" method="POST">
                <input class="form-input" type="text" name="username" id="" placeholder="Masukkan Username"> <br>
                <input class="form-input" type="password" name="password" id="" placeholder="Masukkan Password"> <br>
                <input class="form-submit" type="submit" name="regis" id="" value="Sign Out">
                <a href="../login/login.php" class="regis-back">Back</a>
            </form>
        </div>
    </div>
    <!-- Login End -->
    
    <!-- Feather Icon -->
    <script>
        feather.replace()
    </script>
</body>
</html>