<?php
    include '../../../../connection/koneksi.php';

    $id = $_POST['id_film'];
    $covers = $_POST['cover'];
    $title = $_POST['title_film'];
    $desc = $_POST['desc_film'];
    $cat = $_POST['id_category'];

    if (isset($_POST['ubah'])) {
        $query = mysqli_query($con, "SELECT * FROM films WHERE id_film='$id'");
    
        $FF = mysqli_fetch_array($query);
        $deleteFF = "file_cover/$FF[cover]";
        unlink($deleteFF);

        $extention_diperbolehkan = array('png', 'jpg', 'jpeg');
        $cover = $_FILES['cover']['name'];
        $ex = explode('.', $cover);
        $extention = strtolower(end($ex));
        $size = $_FILES['cover']['size'];
        $file_tmp = $_FILES['cover']['tmp_name'];

        if (in_array($extention, $extention_diperbolehkan) === true) {
            if ($size < 1044070) {
                move_uploaded_file($file_tmp, 'file_cover/'.$cover);
                mysqli_query($con, "UPDATE films SET cover = '$cover', title_film = '$title', desc_film = '$desc', id_category = '$cat' WHERE id_film = '$id'");
            }
        }
    }

    header('location:film.php?pesan=update');
?>