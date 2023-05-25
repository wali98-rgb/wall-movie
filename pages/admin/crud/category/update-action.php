<?php
    include '../../../../connection/koneksi.php';

    $id = $_POST['id_category'];
    $nama = $_POST['name_category'];

    mysqli_query($con, "UPDATE category SET nama_category='$nama' WHERE id_category='$id'");

    header('location:category.php');
?>