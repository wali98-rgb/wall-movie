<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/st.css">

    <!-- My JavaScript -->
    <script src="js/script.js"></script>

    <!-- Font Awesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,400;0,600;1,100;1,200;1,400;1,600&display=swap" rel="stylesheet">

    <!-- Feather Icon -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Icon App -->


    <title>Dashboard | Wall Movie</title>
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar">
        <a href="" class="navbar-img"><img src="img/logo.png" alt="logo" width="50px"></a>
        <h1 class="navbar-name">Wall <span>Movie</span></h1>
        <div class="navbar-ex">
            <!-- <a href="#" id="search"><i data-feather="search"></i></a> -->
            <a href="#" onclick="aktif()" id="hamburger"><i data-feather="menu"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Sidebar Start -->
    <aside class="sidebar">
        <ul class="sidebar-side">
            <li><a href="#"><i data-feather="home"></i> <span>&nbsp; Home</span></a></li>
            <li><a href="#recom"><i data-feather="check-square"></i> <span>&nbsp; Recommended Film</span></a></li>
            <li><a href="#cat-list"><i data-feather="list"></i> <span>&nbsp; Category List</span></a></li>
            <li><a href="pages/public/action/film.php"><i data-feather="film"></i> <span>&nbsp; Film</span></a></li>
            <li><a href="#"><i data-feather="disc"></i> <span>&nbsp; Category</span></a></li>
            <li><a href="#"><i data-feather="alert-circle"></i> <span>&nbsp; About Us</span></a></li>
            <li><a href="auth/logout.php"><i data-feather="log-out"></i> <span>&nbsp; Log Out</span></a></li>
        </ul>
    </aside>
    <!-- Sidebar End -->

    <!-- Hero Start -->
    <section class="hero" id="hero">
        <main class="content">
            <h1>Gemari Berbagai <span>Film</span>.</h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam laboriosam expedita, amet nobis, excepturi ducimus architecto error alias culpa corrupti facilis aspernatur earum dolores tenetur cupiditate aperiam quis id blanditiis.</p>
            <a href="#" class="cta">TELUSURI</a>
        </main>
    </section>
    <!-- Hero End -->
    
    <!-- Cek Login -->
    <?php
        session_start();
        if ($_SESSION['status']!="login") {
            header('location:index.php');
        }
    ?>

    <!-- Reccommend Start -->
    <section class="recom" id="recom">
        <h1 class="title-recom">Recommended <span>Film</span></h1>

        <!-- Container Start -->
        <div class="contain-recom">
            <!-- Card Session Start -->
            <?php
                include 'connection/koneksi.php';
                $no = 1;
                $data = mysqli_query($con, "select
                    films.id_film, films.cover, films.title_film, films.desc_film, films.id_category,
                    category.id_category, category.nama_category,
                    recommended.id_recom, recommended.id_film
                    from films, category, recommended
                    where films.id_category=category.id_category
                    and recommended.id_film=films.id_film
                    order by films.title_film asc");
                
                $dat = mysqli_query($con, "select
                films.id_film, films.cover, films.title_film, films.desc_film, films.id_category,
                category.id_category, category.nama_category
                from films, category
                where films.id_category=category.id_category
                order by films.title_film asc");
                
                foreach ($data as $d) {
                    if ($d > 0) {
            ?>
            <div class="card-recom">
                <div class="img-recom">
                    <img src="<?php echo "pages/admin/crud/film/file_cover/".$d['cover']; ?>" alt="<?php echo $d['cover']; ?>">
                </div>
                <div class="content-recom">
                    <h1><?php echo $d['title_film']; ?></h1>
                    <p>
                        <?php echo substr($d['desc_film'], 0, 115) . "..."; ?>
                    </p>
                    <a href="show.php?id_film=<?php echo $d['id_film']; ?>">Read More</a>
                </div>
            </div>
            <?php
                    }
                }
            ?>
            <!-- Card Session End -->
        </div>
        <!-- Container End -->
        
    </section>
    <!-- Reccommend End -->

    <!-- Category List Start -->
    <section class="cat-list" id="cat-list">
        <h1 class="cat-list-title"><span>List</span> Category</h1>
        <div class="cat-list-container">
            <div class="cat-list-content-main">
                <div class="cat-list-img">
                    <img src="img/user/cat-list.jpg" alt="category-list">
                </div>
                <div class="cat-list-explain">
                    <h1>Category</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure maxime, numquam repellendus, voluptate aliquam quae omnis voluptatum assumenda eveniet voluptatibus quam est cum animi, ducimus ipsum. Ducimus praesentium perspiciatis at!</p>
                </div>
            </div>
            <div class="cat-list-content-choose">
                <?php
                    $genre = mysqli_query($con, "select * from category");
                    while ($gen = mysqli_fetch_array($genre)) {
                ?>
                    <a href="#"><?php echo $gen['nama_category']; ?></a>
                <?php
                    }
                ?>
            </div>
        </div>
    </section>
    <!-- Category List End -->

    <!-- Namanya -->
    <!-- <h4>Selamat datang, <?php // echo $_SESSION['username']; ?>! anda Login.</h4> -->
    <!-- <a href="auth/logout.php">Logout</a> -->

    <!-- Footer Start -->
    <footer class="footer" id="foot">
        <a class="footer-foot-btn-up" href="#" target="_top"><i data-feather="arrow-up"></i></a>
        <h1 class="foot-title">Contact Us</h1>
        <div class="footer-foot">
            <div class="footer-foot-main-maps">
                <h1>Jl. Tamansari No. 96A/56</h1>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d457.3175030632028!2d107.60832377334482!3d-6.894986313321123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e65a8a4d5bcd%3A0x8e5e459c894ee5da!2sJl.%20Kebun%20Binatang%20Jl.%20Tamansari%2C%20Lb.%20Siliwangi%2C%20Kecamatan%20Coblong%2C%20Kota%20Bandung%2C%20Jawa%20Barat%2040132!5e0!3m2!1sid!2sid!4v1682072077719!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="footer-foot-main-action">
                <div class="foot-action-socmed">
                    <h1><span>Social</span> Media</h1>
                    <div class="foot-action-socmed-btn">
                        <a href="#"><i data-feather="instagram"></i></a>
                        <a href="#"><i data-feather="youtube"></i></a>
                        <a href="#"><i data-feather="facebook"></i></a>
                    </div>
                </div>
                <div class="foot-action-rate">
                    <h1>Comment & <span>Rate</span></h1>
                    <div class="foot-action-form">
                        <form action="index.php" class="form-comment-rate" method="POST">
                            <!-- Input Comment -->
                            <input class="form-comment" type="text" name="nama_profile" id="" placeholder="Username" value="<?php echo $_SESSION['username']; ?>" readonly> <br>
                            <!-- <input class="form-comment" type="text" name="nama_film" id="" placeholder="Film Name"> <br> -->
                            <select style="width: 37rem;" class="form-comment" name="nama_film" id="">
                                <option value="" selected disabled>--Pilih Film--</option>
                                <?php
                                    $filmChoose = mysqli_query($con, "select * from films");

                                    while($fc = mysqli_fetch_array($filmChoose)) {
                                ?>
                                        <option value="<?php echo $fc['id_film']; ?>"><?php echo $fc['title_film'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                            <textarea class="form-comment" name="comment" id="" cols="30" rows="10" placeholder="Give Your Comment.."></textarea> <br>

                            <!-- Input Rate -->
                            <label class="rate-title" for="">Rating</label> <br>
                            <table width="100%" cellspacing="4">
                                <tr align="center">
                                    <td>
                                        <input class="form-rate" type="radio" name="rate_film" id="rate1" value="1"> 
                                    </td>
                                    <td>
                                        <input class="form-rate" type="radio" name="rate_film" id="rate2" value="2"> 
                                    </td>
                                    <td>
                                        <input class="form-rate" type="radio" name="rate_film" id="rate3" value="3"> 
                                    </td>
                                    <td>
                                        <input class="form-rate" type="radio" name="rate_film" id="rate4" value="4"> 
                                    </td>
                                    <td>
                                        <input class="form-rate" type="radio" name="rate_film" id="rate5" value="5"> 
                                    </td>
                                </tr>
                                <tr align="center">
                                    <td>
                                        <label class="foot-label" for="rate1">1</label>
                                    </td>
                                    <td>
                                        <label class="foot-label" for="rate2">2</label>
                                    </td>
                                    <td>
                                        <label class="foot-label" for="rate3">3</label>
                                    </td>
                                    <td>
                                        <label class="foot-label" for="rate4">4</label>
                                    </td>
                                    <td>
                                        <label class="foot-label" for="rate5">5</label> <br>
                                    </td>
                                </tr>
                            </table>
                            <p align="center"><input class="form-send" type="submit" name="save" id="" value="Send"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p align="center">&copy; | Copyright by : <a href="https://www.instagram.com/waliyyudin_wali/" target="_blank" style="color: var(--bg);">Waliyyudin</a> 2023.</p>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- Proses Input Rating Start -->
    <?php
        if (isset($_POST['save'])) {
            mysqli_query($con, "insert into rates set
                username = '$_POST[nama_profile]',
                comment = '$_POST[comment]',
                rate_film = '$_POST[rate_film]',
                id_film = '$_POST[nama_film]'
            ");
        }
    ?>
    <!-- Proses Input Rating End -->

    <!-- Feather Icon -->
    <script>
        feather.replace()
    </script>
</body>

</html>