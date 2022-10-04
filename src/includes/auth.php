<?php 

    session_start();

    if (!isset($_SESSION['user_id'])){
        header('location: login.php');
        die();
    } else {
        header('location: index.php');
        die();
    }


?>