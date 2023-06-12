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
    

    <title>Update Film | Wall Movie</title>
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
    
    <!-- Navbar Start -->
    <?php
        include('../../../../partials/admin/navbar.php');
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
                <li><a href="../../home.php"><i data-feather="home"></i> <span>Dashboard</span></a></li>
                <li><a style="background-color: #F0F2B6; color: #224B0C; font-weight: 600;" href="film.php"><i data-feather="film"></i> <span>Film</span></a></li>
                <li><a href="../category/category.php"><i data-feather="disc"></i> <span>Category</span></a></li>
                <li><a href="../recommended/recommended.php"><i data-feather="check-square"></i> <span>Recommended</span></a></li>
                <li><a href="../user/user.php"><i data-feather="user"></i> <span>User</span></a></li>
                <li><a href="../../../../auth/logout.php"><i data-feather="log-out"></i> <span>Log Out</span></a></li>
            </ul>
        </main>
    </aside>
    <!-- Sidebar End -->

    <!-- Create Film Start -->
    <section class="section-admin">
        <main class="section-admin-content">
            <h1 class="section-title">Update Film</h1>
            <a class="section-btn-back" href="film.php"><i data-feather="arrow-left-circle"></i> <label for="">&nbsp; Back</label></a>
            <div class="section-content">
                <?php
                    include '../../../../connection/koneksi.php';

                    $id = $_GET['id_film'];
                    $dat = mysqli_query($con, "select * from films where id_film='$id'");
                    
                    while ($data = mysqli_fetch_array($dat)) {
                    // foreach ($dat as $d) {
                ?>
                <form action="update-action.php" method="POST" class="form-section" enctype="multipart/form-data">
                    <table class="table">
                        <tr>
                            <th width="20%"><label for="">Cover</label></th>
                            <td width="80%">
                                <input type="hidden" name="id_film" id="" value="<?php echo $data['id_film']; ?>">
                                <input type="file" name="cover" id="" placeholder="Masukkan Cover Film" value="<?php echo $data['cover']; ?>" required> <br>
                            </td>
                        </tr>
                        <tr>
                            <th width="20%"><label for="">Judul Film</label></th>
                            <td width="80%">
                                <input type="text" name="title_film" id="" placeholder="Masukkan Judul Film" value="<?php echo $data['title_film']; ?>" required> <br>
                            </td>
                        </tr>
                        <tr>
                            <th width="20%"><label for="">Deskripsi Film</label></th>
                            <td width="80%">
                                <textarea name="desc_film" id="" cols="30" rows="10" required placeholder="Masukkan Deskripsi Film"><?php echo $data['desc_film']; ?></textarea> <br>
                            </td>
                        </tr>
                        <tr>
                            <th width="20%"><label for="">Kategori Film</label></th>
                            <td width="80%">
                                <select name="id_category" id="">
                                    <?php
                                        include '../../../../connection/koneksi.php';

                                        $query = mysqli_query($con, "select
                                        films.id_film, films.id_category,
                                        category.id_category, category.nama_category
                                        from films, category
                                        where films.id_category=category.id_category
                                        ");
                                        
                                        // if ($data['id_category'] > 0) {
                                            ?>
                                                <!-- <option value="<?php // echo $query['id_category']; ?>" selected><?php // echo $query['nama_category']; ?></option> -->
                                            <?php
                                        // }
                                    ?>
                                    <option value="">Pilih Kategori</option>
                                    <?php
                                        $data = mysqli_query($con, "select * from category");
                                        // foreach ($data as $d) {
                                        while ($d = mysqli_fetch_array($data)) {
                                            // if ($query['id_category'] === $d['id_category']) {
                                            ?>
                                                <!-- <option value="<?php echo $d['id_category']; ?>" selected><?php echo $d['nama_category']; ?></option> -->
                                            <?php
                                            // } else {
                                            ?>
                                                <option value="<?php echo $d['id_category']; ?>"><?php echo $d['nama_category']; ?></option>
                                            <?php
                                            // }
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button type="submit" name="ubah" class="form-submit"><i data-feather="save"></i> &nbsp; <label for="">Ubah</label></button>
                            </td>
                            <td></td>
                        </tr>
                    </table>
                </form>
                <?php
                    }
                ?>
            </div>
        </main>
    </section>
    <!-- Create Film End -->

    <script>
        feather.replace()
    </script>
</body>
</html>