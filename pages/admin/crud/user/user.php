<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- My CSS -->
    <link rel="stylesheet" href="../../css/layout.css">

    <!-- Font Awesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,400;0,600;1,100;1,200;1,400;1,600&display=swap" rel="stylesheet">

    <!-- Feather Icon -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Icon App -->
    <link rel="icon" href="">
    
    <title>Users | Wall Movie</title>
</head>
<body>
    <!-- Check Login Start -->
    <?php
        session_start();
        if ($_SESSION['status'] != "login") {
            header('location:../../auth/login/login.php?pesan=belum_login');
        } else if ($_SESSION['status'] == "login" && $_SESSION['level'] == "user" || $_SESSION['level'] == "jurnal") {
            header('location:../../index.php');
        }
    ?>
    <!-- Check Login End -->
    
    <!-- Loader Start -->
    <!-- Loader End -->
    
    <!-- Navbar Start -->
    <?php
        include('../../../../partials/admin/navbar.php')
    ?>
    <!-- Navbar End -->

    <!-- Sidebar Start -->
    <aside class="sidebar-admin">
        <main class="sidebar-admin-content">
            <a class="sidebar-admin-logo" href="../../pages/admin/home.php">
                <img src="../../../../img/logo.png" alt="Logo-Admin-Wall-Movie">
                <span style="display: flex; align-items: center;">
                    <i data-feather="user"></i>
                    &nbsp;
                    <label for=""><?php echo $_SESSION['username']; ?></label>
                </span>
            </a>
            <ul class="menu-admin">
                <li><a href="../../../../pages/admin/home.php"><i data-feather="home"></i> <span>Dashboard</span></a></li>
                <li><a href="../film/film.php"><i data-feather="film"></i> <span>Film</span></a></li>
                <li><a href="../category/category.php"><i data-feather="disc"></i> <span>Category</span></a></li>
                <li><a href="../recommended/recommended.php"><i data-feather="check-square"></i> <span>Recommended</span></a></li>
                <li><a style="background-color: #F0F2B6; color: #224B0C; font-weight: 600;" href="user.php"><i data-feather="user"></i> <span>User</span></a></li>
                <li><a href="../../../../auth/logout.php"><i data-feather="log-out"></i> <span>Log Out</span></a></li>
            </ul>
        </main>
    </aside>
    <!-- Sidebar End -->

    <!-- Section Start -->
    <section class="section-admin">
        <main class="section-admin-content">
            <h1 class="section-title">Users Page</h1>
            <a style="display: flex; align-items: center; width: 16.5rem; text-transform: uppercase; justify-content: center" href="create.php"><i data-feather="plus-circle"></i> &nbsp; <label for="">Create User</label></a>
            <div class="section-content section-user">
                <?php 
                    include '../../../../connection/koneksi.php';
                    $no = 1;
                    $data = mysqli_query($con, "select * from user where level='user' order by nama_user asc");
                        
                    foreach ($data as $d) {
                    // while ($d = mysqli_fetch_array($data)) {
                        if ($d > 0) {
                ?>
                <div class="section-card" style="margin: 1rem; width: 20rem; color: #224B0C;">
                    <?php
                        $photo_user = $d['photo_user'];
                        if ($photo_user == "") {
                            echo "<i>Silahkan Isi Photo</i>";
                        } else {
                    ?>
                    <img width="20rem" height="30rem" src="<?php echo 'file_photo/' . $d['photo_user']; ?>" alt="<?php echo $d['username']; ?>">
                    <?php
                        }
                    ?>
                    <div class="section-card-body" style="margin: 1rem 0 0;">
                        <h2 style="margin: 0 0 .5rem;">
                            <?php
                                $nama_user = $d['nama_user'];
                                if ($nama_user == "") {
                                    echo "<i>Silahkan Isi Nama Lengkap</i>";
                                } else {
                                    echo $nama_user;
                                }
                            ?>
                        </h2>
                        <span style="padding: .2rem .3rem; display: flex; justify-content: end; color: #F0F2B6; border-radius: .5rem;">
                            <?php
                                $no_hp = $d['no_hp'];
                                if ($no_hp == 0) {
                                    echo "<i>Silahkan Isi Nomor Telepon</i>";
                                } else {
                                    echo $no_hp;
                                }
                            ?>
                        </span>
                        <hr style="margin: .5rem 0 0;" size="-2px" color="#224B0C">
                        <h3>Username :
                            <?php
                                $username = $d['username'];
                                if ($username == "") {
                                    echo "<i>Silahkan Isi Username</i>";
                                } else {
                                    echo $username;
                                }
                            ?>
                        </h3>
                        <h3>
                            <?php
                                $email = $d['email'];
                                if ($email == "") {
                                    echo "<i>Silahkan Isi Email</i>";
                                } else {
                                    echo $d['email'];
                                }
                            ?>
                        </h3>
                        <div style="margin: 1rem 0 0; display: flex; justify-content: center;">
                            <a style="margin: 0 .2rem; background-color: yellow; color: black; display: flex; align-items: center; justify-content: center;" href="update.php?id_user=<?php echo $d['id_user']; ?>"><i data-feather="edit"></i> &nbsp; <label for="">EDIT</label></a>
                            <!-- <a href="show.php?id_profile=<?php // echo $d['id_profile']; ?>">SHOW</a> -->
                            <a style="margin: 0 .2rem; background-color: red; display: flex; align-items: center; justify-content: center;" href="delete.php?id_user=<?php echo $d['id_user']; ?>"><i data-feather="trash"></i> &nbsp; <label for="">HAPUS</label></a>
                        </div>
                    </div>
                </div>
                
                <?php 
                        } else if ($d == 0) {
                            echo '<tr>
                                    <td class="row-table-data" colspan="3">Data is not Available.</td>
                                </tr>';
                        }
                    }
                ?>
            </div>
        </main>
    </section>
    <!-- Section End -->

    <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "berhasil") {
                echo "Data berhasil ditambahkan!";
            }
        }
    ?>

    <!-- Footer Start -->
    <!-- Footer End -->

    <!-- Feather Icon -->
    <script>
        feather.replace()
    </script>
</body>
</html>