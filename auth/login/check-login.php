<?php
    session_start();
    include '../../connection/koneksi.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = mysqli_query($con, "SELECT * FROM user WHERE username='$username' AND password='$password'");

    $cek = mysqli_num_rows($data);

    if ($cek > 0) {
        $d = mysqli_fetch_assoc($data);

        if ($d['level'] == 'admin') {
            $_SESSION['username'] = $username;
            $_SESSION['level'] = 'admin';
            $_SESSION['status'] = 'login';

            header('location:../../pages/admin/home.php');
        } else if ($d['level'] == 'user') {
            $_SESSION['username'] = $username;
            $_SESSION['level'] = 'user';
            $_SESSION['status'] = 'login';

            header('location:../../index.php');
        } 
    } else {
        header('location:login.php?pesan=gagal');
    }
?>