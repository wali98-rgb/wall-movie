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
    
    <title>Film Admin | Wall Movie</title>
</head>
<body>
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
                <li><a href="film.php"><i data-feather="film"></i> <span>Film</span></a></li>
                <li><a href="../category/category.php"><i data-feather="disc"></i> <span>Category</span></a></li>
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
            <?php
                include '../../../../connection/koneksi.php';

                $id = $_GET['id_film'];
                $dat = mysqli_query($con, "select
                films.id_film, films.cover, films.title_film, films.desc_film, films.id_category,
                category.id_category, category.nama_category
                from films, category
                where films.id_category=category.id_category
                and films.id_film = '$id'");

                while ($d = mysqli_fetch_array($dat)) {
            ?>
            <h1 class="section-title"><?php echo $d['title_film']; ?></h1>
            <a class="section-btn-back" href="film.php"><i data-feather="arrow-left"></i> Back</a>
            <div class="section-content">
                <div class="section-content-main">
                    <div class="section-content-main-img">
                        <img src="<?php echo "file_cover/".$d['cover']; ?>" alt="<?php echo $d['title_film']; ?>">
                    </div>
                    <div class="section-content-main-field">
                        <h1 class="title-field"><?php echo $d['title_film']; ?></h1>
                        <span><?php echo $d['nama_category'] ?></span>
                        <p class="desc-field"><?php echo $d['desc_film']; ?></p>

                    </div>
                </div>
            </div>
            <?php
                }
            ?>
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