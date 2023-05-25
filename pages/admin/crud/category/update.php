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
    

    <title>Create Category | Wall Movie</title>
</head>
<body>
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
                <span>Wall Movie</span>
            </a>
            <ul class="menu-admin">
                <li><a href="../../../../pages/admin/home.php"><i data-feather="home"></i> <span>Dashboard</span></a></li>
                <li><a href="../../../../pages/admin/crud/film/film.php"><i data-feather="film"></i> <span>Film</span></a></li>
                <li><a href="category.php"><i data-feather="disc"></i> <span>Category</span></a></li>
                <li><a href="../recommended/recommended.php"><i data-feather="check-square"></i> <span>Recommended</span></a></li>
                <li><a href="../user/user.php"><i data-feather="user"></i> <span>User</span></a></li>
                <li><a href="../../../../auth/logout.php"><i data-feather="log-out"></i> <span>Log Out</span></a></li>
            </ul>
        </main>
    </aside>
    <!-- Sidebar End -->

    <!-- Create Category Start -->
    <section class="section-admin">
        <main class="section-admin-content">
            <h1 class="section-title"> Create Category</h1>
            <a class="section-btn-back" href="category.php"><i data-feather="arrow-left"></i> Back</a>
            <div class="section-content">
                <?php
                    include '../../../../connection/koneksi.php';

                    $id = $_GET['id_category'];
                    $query = mysqli_query($con, "select * from category where id_category='$id'") or die(mysqli_error());

                    while ($data = mysqli_fetch_array($query)) {
                ?>
                <form action="update-action.php" method="POST" class="form-section">
                    <table class="table">
                        <tr>
                            <th width="20%"><label for="">Nama Kategori :</label></th>
                            <td width="80%">
                                <input type="hidden" name="id_category" id="" placeholder="Masukkan Nama Kategori" value="<?php echo $data['id_category'] ?>" required> <br>
                                <input type="text" name="name_category" id="" placeholder="Masukkan Nama Kategori" value="<?php echo $data['nama_category'] ?>" required> <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="form-submit" type="submit" name="simpan" id="" value="Simpan Perubahan">
                            </td>
                            <td></td>
                        </tr>
                    </table>
                </form>
                <?php } ?>
            </div>
        </main>
    </section>
    <!-- Create Category End -->

    <script>
        feather.replace()
    </script>
</body>
</html>