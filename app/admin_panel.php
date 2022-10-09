<?php
    require_once('../src/includes/auth.php');

    if (
        isset($_SESSION['ADMIN'])){
        $user_id = $_SESSION['ID_User'];
        $user_username = $_SESSION['username'];
        $user_fullname = $_SESSION['nama_lengkap'];
        $user_email = $_SESSION['email'];  
        $user_foto = $_SESSION['foto'];
    } else {
        header('location: index.php');
        die();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/bootstrap/css/bootstrap.css">    
    <link rel="stylesheet" href="../src/css/style.css">        
    <title>Prolangram | ADMIN PANEL</title>
</head>
<body>

<main id="main-frame">
        <?php require('../src/includes/views/sideNavbar.php')?>
        <div class="main-content">
                <section class="main-content-wrapper dashboard-header">
                    <h1 class="dashboard-page-title">Admin Panel</h1>
                </section>      

                
                 <button><a href="../src/includes/statistic.php">Export Post Statistics</a></button>

       
        </div>
        <?php require('../src/includes/views/friendRecommendation.php')?>
    </main> 

    <div id="overlay-logout" hidden>
        <div id="box" class="alert" role="alert">
            <h4 class="alert-heading">Log Out</h4>
            <p>Are you sure want to Log Out?</p>
            <hr>
            <div class="row">
                <div class="col">
                    <button class="btn btn-primary" onclick="logOut()"><a id="button-yes" href="logout.php">Yes</a></button>
                </div>
                <div class="col">
                    <button id="button-no" class="btn btn-primary">No</button>
                </div>
            </div>
        </div>
    </div>

    

    <script src="../src/bootstrap/js/bootstrap.min.js"></script>
    <script src="../src/js/script.js"></script>
    <script src="../src/js/handle.js"></script>    
</body>
</html>
