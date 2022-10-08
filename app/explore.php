<?php
    require_once('../src/includes/auth.php');

    require_once("../vendor/autoload.php");
          
    $dotenv = Dotenv\Dotenv::createImmutable('../');
    $dotenv->load();    
    require_once('../src/includes/db_external.php');      

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


    if (isset($_GET['u'])){
        $user_name = $_GET['u'];
        
        // GET USER ID
        $getUIDQuery = "SELECT ID_User, username, nama_lengkap, foto FROM User WHERE User.username = ?";
        $getIDQueryExecution = $db->prepare($getUIDQuery);
        $getIDQueryExecution->execute([$user_name]);
    
        $userInfo = $getIDQueryExecution->fetch(PDO::FETCH_ASSOC); 
        if (isset($userInfo['ID_User'])){
            $userID = $userInfo['ID_User'];
            // GET POSTS COUNT
    
            $postCountQuery = "SELECT COUNT(*) AS 'jumlah_post' FROM Post WHERE Post.ID_User = ?";
            $queryExecution = $db->prepare($postCountQuery);
            $queryExecution->execute([$userID]);
    
            $postCount = $queryExecution->fetch(PDO::FETCH_ASSOC);
            
    
            // GET ALL POSTS
            $getAllPostQuery = "SELECT 
            Post.KATEGORI AS 'tag',
            Post.ISI AS 'caption',
            Post.ID_Post AS 'id',
            (SELECT nama_gambar FROM Gambar_Postingan WHERE Urutan = 1 AND Gambar_Postingan.ID_Post = Post.ID_Post) AS nama_gambar              
            FROM Post WHERE Post.ID_User = ?";
    
            $getAllPostQueryExecution = $db->prepare($getAllPostQuery);
            $getAllPostQueryExecution->execute([$userID]);            
        }



        
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
                <section class="mt-3 main-content-wrapper dashboard-header search-box-header">
                        <div class="row justify-content-center mb-3 search-user-type">
                            <div class="col-lg-3 col-sm-6 col-8 border border-dark p-2 search-user-type">
                                <input class="input-login-and-register search-user-type search-user-form" id="login-form-username" type="text" name="u" placeholder="Search People" form="search-user" onkeyup="liveSearch(this.value);" onclick="showSearchResult();">
                            </div>
                        </div>      
                        <div class="search-box" style="display:none;">
                            <!-- jangan diilangin -->                                                  
                        </div>
                        
                        <button id="button-explore" type="submit" form="search-user">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352c79.5 0 144-64.5 144-144s-64.5-144-144-144S64 128.5 64 208s64.5 144 144 144z"/></svg>
                        </button>           
                </section>             

                <?php 
                    if (isset($_GET['u']) && isset($userInfo['ID_User'])){
                    // kerjain view post disini ?>

                    <!-- HTML nya disini -->

                    <div class="profile-header">
                        <img class="profile-picture" src="../src/user_pfp/<?= !$userInfo['foto'] ? 'no-pfp.webp': htmlspecialchars($userInfo['foto'])?>"/>
                        <div class="profile-header-desc">
                            <h1><?=htmlspecialchars($userInfo['username'])?></h1>
                            <h1><?=htmlspecialchars($userInfo['nama_lengkap'])?></h1>                            
                            <p><?=htmlspecialchars($postCount['jumlah_post'])?> posts</p>
                        </div>
                    </div> 

                    <section class="profile-post-list">
                        <h1>POSTS</h1>

                        <!-- template preview postingan -->


                        <?php while($post = $getAllPostQueryExecution->fetch(PDO::FETCH_ASSOC)){?>

                        <div class="post-preview" onclick="redirectToPostPage('<?=htmlspecialchars($post['id'])?>')">
                            <img class="post-pict-preview" src="../src/user_post_pictures/<?=htmlspecialchars($post['nama_gambar'])?>"/>
                            <div class="post-preview-desc">
                                <h1>#<?=htmlspecialchars($post['tag'])?></h1>
                                <p><?=htmlspecialchars($post['caption'])?></p>
                            </div>
                        </div>
                
                        <?php }?>


                    </section>



                <?php }?>

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
                    <button class="btn btn-primary" href="logout.php"><a id="button-yes" href="logout.php">Yes</a></button>
                </div>
                <div class="col">
                    <button id="button-no" class="btn btn-primary">No</button>
                </div>
            </div>
        </div>
    </div>
    
    <script src="../src/bootstrap/js/bootstrap.min.js"></script>
    <script src="../src/js/handle.js"></script>      
    <script src="../src/js/script.js"></script>
    <script src="../src/js/admin.js"></script>          
</body>
</html>
