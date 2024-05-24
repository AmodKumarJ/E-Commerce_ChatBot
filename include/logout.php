<?php
    session_start();

    $_SESSION['isLogin'] = "";
    $_SESSION['user_id'] = "";
    $_SESSION['user_name'] = "";

    unset($_SESSION['isLogin']);
    unset($_SESSION['user_id']);
    unset($_SESSION['user_name']);

    echo "<script>location.href='../login.php';</script>";

?>