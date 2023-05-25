<?php
    include '../../../../connection/koneksi.php';

    if (isset($_POST['simpan'])) {
        $extention_diperbolehkan = array('png', 'jpg', 'jpeg');
        $cover = $_FILES['cover']['name'];
        $ex = explode('.', $cover);
        $extention = strtolower(end($ex));
        $size = $_FILES['cover']['size'];
        $file_tmp = $_FILES['cover']['tmp_name'];

        if (in_array($extention, $extention_diperbolehkan) === true) {
            if ($size < 1044070) {
                move_uploaded_file($file_tmp, 'file_cover/'.$cover);
                mysqli_query($con, "INSERT into films set
                    cover = '$cover',
                    title_film = '$_POST[title_film]',
                    desc_film = '$_POST[desc_film]',
                    id_category = '$_POST[id_category]'
                ");
            }
        }
    }

    header('location:film.php');
?>