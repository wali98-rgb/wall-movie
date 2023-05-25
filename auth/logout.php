<?php
    session_start();

    // Menghapus Session
    session_destroy();

    header('location:login/login.php?pesan=logout')
?>