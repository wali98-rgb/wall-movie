<?php
    include '../../../../connection/koneksi.php';

    $id = $_GET['id_recom'];

    mysqli_query($con, "DELETE FROM recommended WHERE id_recom='$id'") or die(mysqli_error());
    header('location:recommended.php');
?>