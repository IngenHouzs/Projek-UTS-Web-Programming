<?php 
    if (isset($_SESSION['ID_User'])){
        header('location: index.php');
        die();
    }
?>