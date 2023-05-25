<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- My CSS -->
    <link rel="stylesheet" href="../../../../css/admin-css/layout.css">

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
                <span>Wall Movie</span>
            </a>
            <ul class="menu-admin">
                <li><a href="../../../../pages/admin/home.php"><i data-feather="home"></i> <span>Dashboard</span></a></li>
                <li><a href="../film/film.php"><i data-feather="film"></i> <span>Film</span></a></li>
                <li><a href="../category/category.php"><i data-feather="disc"></i> <span>Category</span></a></li>
                <li><a href="../recommended/recommended.php"><i data-feather="check-square"></i> <span>Recommended</span></a></li>
                <li><a href="user.php"><i data-feather="user"></i> <span>User</span></a></li>
                <li><a href="../../../../auth/logout.php"><i data-feather="log-out"></i> <span>Log Out</span></a></li>
            </ul>
        </main>
    </aside>
    <!-- Sidebar End -->

    <!-- Section Start -->
    <section class="section-admin">
        <main class="section-admin-content">
            <h1 class="section-title">Users Page</h1>
            <a href="create.php"><i data-feather="plus"></i> Create User</a>
            <div class="section-content">
                <table class="section-table">
                    <tr>
                        <th class="row-table-head">#</th>
                        <th class="row-table-head">Photo</th>
                        <th class="row-table-head">Name</th>
                        <th class="row-table-head">Username</th>
                        <th class="row-table-head">Email</th>
                        <th class="row-table-head">No. HP</th>
                        <th class="row-table-head">Action</th>
                    </tr>
                    <?php 
                        include '../../../../connection/koneksi.php';
                        $no = 1;
                        $data = mysqli_query($con, "select
                            user.id_user, user.username,
                            profiles.id_profile, profiles.nama_profile, profiles.email, profiles.no_hp, profiles.id_user
                            from user, profiles
                            where profiles.id_user=user.id_user
                            order by profiles.nama_profile
                        ");
                            
                        foreach ($data as $d) {
                        // while ($d = mysqli_fetch_array($data)) {
                            if ($d > 0) {
                    ?>
                    <tr>
                        <td class="row-table-data"><?php echo $no++; ?></td>
                        <td class="row-table-data"><img src="<?php echo "file_photo/".$d['photo']; ?>" alt=""></td>
                        <td class="row-table-data"><?php echo $d['nama_profile']; ?></td>
                        <td class="row-table-data"><?php echo $d['username']; ?></td>
                        <td class="row-table-data"><?php echo $d['email']; ?></td>
                        <td class="row-table-data"><?php echo $d['no_hp']; ?></td>
                        <td class="row-table-data">
                            <a href="update.php?id_profile=<?php echo $d['id_profile']; ?>">EDIT</a>
                            <!-- <a href="show.php?id_profile=<?php // echo $d['id_profile']; ?>">SHOW</a> -->
                            <a href="delete.php?id_profile=<?php echo $d['id_profile']; ?>">HAPUS</a>
                        </td>
                    </tr>
                    <?php 
                            } else if ($d == 0) {
                                echo '<tr>
                                        <td class="row-table-data" colspan="3">Data is not Available.</td>
                                    </tr>';
                            }
                        }
                    ?>
                    <tr>
                        <th class="row-table-foot">#</th>
                        <th class="row-table-foot">Photo</th>
                        <th class="row-table-foot">Name</th>
                        <th class="row-table-foot">Username</th>
                        <th class="row-table-foot">Email</th>
                        <th class="row-table-foot">No. HP</th>
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