<?php
    include '../../../../connection/koneksi.php';

    $id = $_GET['id_film'];
    $query = mysqli_query($con, "SELECT * FROM films WHERE id_film='$id'");

    $FF = mysqli_fetch_array($query);
    $deleteFF = "file_cover/$FF[cover]";
    unlink($deleteFF);

    mysqli_query($con, "DELETE FROM films WHERE id_film='$id'") or die(mysqli_error());
    header('location:film.php');
?>