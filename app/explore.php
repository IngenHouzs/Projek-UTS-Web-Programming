<?php
    require_once('../src/includes/auth.php');

    if (
        isset($_SESSION['ID_User']) &&
        isset($_SESSION['nama_lengkap']) &&
        isset($_SESSION['username']) &&
        isset($_SESSION['email'])                        
    ){
        $user_id = $_SESSION['ID_User'];
        $user_username = $_SESSION['username'];
        $user_fullname = $_SESSION['nama_lengkap'];
        $user_email = $_SESSION['email'];  
        $user_foto = $_SESSION['foto'];
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
    <title>Prolangram | Search User</title>
</head>
<body>

<main id="main-frame">
        <?php require('../src/includes/views/sideNavbar.php')?>
        <div class="main-content">
                <form id="search-user" action="explore.php" method="GET"></form>
                <section class="main-content-wrapper dashboard-header">
                        <div class="row justify-content-center mb-3 search-user-type">
                            <div class="col-lg-3 col-sm-6 col-8 border border-dark p-2 search-user-type">
                                <input class="input-login-and-register search-user-type" id="login-form-username" type="text" name="u" placeholder="Search People" form="search-user">
                            </div>
                        </div>     
                        <button type="submit" form="search-user">Search</button>           
                </section>             

                <?php 
                    if (isset($_GET['u'])){
                    // kerjain view post disini
                ?>
                    
                <?php }?>

        </div>
        <?php require('../src/includes/views/friendRecommendation.php')?>
    </main>
    

    <script src="../src/bootstrap/js/bootstrap.min.js"></script>
    <script src="../src/js/script.js"></script>
    <script src="../src/js/handle.js"></script>    
</body>
</html>
