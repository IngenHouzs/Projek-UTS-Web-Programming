<?php 
    session_start();

  if (
        isset($_SESSION['id_user']) &&
        isset($_SESSION['nama_lengkap']) &&
        isset($_SESSION['username']) &&
        isset($_SESSION['email'])                        
    ){
        header('location: login.php');
        die();
    } else {
        header('location: index.php');
        die();
    }

?>



