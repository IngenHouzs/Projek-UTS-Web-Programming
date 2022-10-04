<?php 
    session_start();

  if (
        isset($_SESSION['ID_User']) &&
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



