<?php
    include '../../../../connection/koneksi.php';
    
    if (isset($_POST['simpan'])) {
        mysqli_query($con, "INSERT INTO category SET
            nama_category = '$_POST[name_category]'
        ");
    }

    header('location:category.php');
?>