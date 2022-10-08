<?php
    session_start();

    if(isset($_SESSION['ID_User'])) session_destroy();
    header('Location: index.php');
?>