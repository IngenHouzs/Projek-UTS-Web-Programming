<?php 
    session_start();
    if (!isset($_SESSION['ID_User'])){
        header('location: login.php');
        die();
    } 


?>