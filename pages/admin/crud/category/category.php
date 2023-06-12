<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- My CSS -->
    <link rel="stylesheet" href="../../css/layout.css" />

    <!-- Font Awesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,400;0,600;1,100;1,200;1,400;1,600&display=swap" rel="stylesheet">

    <!-- Feather Icon -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Icon App -->
    <link rel="icon" href="">
    
    <title>Category Admin | Wall Movie</title>
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
                <li><a href="../../../../pages/admin/crud/film/film.php"><i data-feather="film"></i> <span>Film</span></a></li>
                <li><a style="background-color: #F0F2B6; color: #224B0C; font-weight: 600;" href="category.php"><i data-feather="disc"></i> <span>Category</span></a></li>
                <li><a href="../recommended/recommended.php"><i data-feather="check-square"></i> <span>Recommended</span></a></li>
                <li><a href="../user/user.php"><i data-feather="user"></i> <span>User</span></a></li>
                <li><a href="../../../../auth/logout.php"><i data-feather="log-out"></i> <span>Log Out</span></a></li>
            </ul>
        </main>
    </aside>
    <!-- Sidebar End -->

    <!-- Section Start -->
    <section class="section-admin">
        <main class="section-admin-content">
            <h1 class="section-title">Category Page</h1>
            <a style="display: flex; align-items: center; width: 16.5rem; text-transform: uppercase; justify-content: center" href="create.php"><i data-feather="plus-circle"></i> &nbsp; <label for="">Create Category</label></a>
            <div class="section-content">
                <table class="section-table">
                    <tr>
                        <th class="row-table-head">#</th>
                        <th class="row-table-head">Nama Kategory</th>
                        <th width="250px" class="row-table-head">Action</th>
                    </tr>
                    <?php 
                        include '../../../../connection/koneksi.php';
                        $no = 1;
                        $data = mysqli_query($con, "select * from category order by nama_category asc");
                            while($d = mysqli_fetch_array($data)){
                                if ($d > 0) {
                                ?>
                                <tr>
                                    <td class="row-table-data"><?php echo $no++; ?></td>
                                    <td class="row-table-data"><?php echo $d['nama_category']; ?></td>
                                    <td class="row-table-data" style="display: flex; align-items: center; justify-content: center;">
                                        <a style="margin: 0 .2rem; background-color: yellow; color: black; display: flex; align-items: center; justify-content: center;" href="update.php?id_category=<?php echo $d['id_category']; ?>"><i data-feather="edit"></i> &nbsp; <label for="">EDIT</label></a>
                                        <a style="margin: 0 .2rem; background-color: red; display: flex; align-items: center; justify-content: center;" href="delete.php?id_category=<?php echo $d['id_category']; ?>"><i data-feather="trash"></i> &nbsp; <label for="">HAPUS</label></a>
                                    </td>
                                </tr>
                                <?php 
                                    } else {
                                ?>
                                <tr>
                                    <td class="row-table-data" colspan="3">Data is not Available.</td>
                                </tr>
                            <?php
                                }
                            }
                    ?>
                    <tr>
                        <th class="row-table-foot">#</th>
                        <th class="row-table-foot">Nama Kategory</th>
                        <th class="row-table-foot">Action</th>
                    </tr>
                </table>
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