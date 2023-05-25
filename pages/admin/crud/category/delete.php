<?php
    include '../../../../connection/koneksi.php';

    $id = $_GET['id_category'];
    mysqli_query($con, "DELETE FROM category WHERE id_category='$id'") or die(mysqli_error());

    header('location:category.php');
?>