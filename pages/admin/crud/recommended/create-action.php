<?php
    include '../../../../connection/koneksi.php';
    
    if (isset($_POST['simpan'])) {
        mysqli_query($con, "INSERT INTO recommended SET
            id_film = '$_POST[id_film]'
        ");
    }

    header('location:recommended.php');
?>