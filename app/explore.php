<?php
    // require_once('../src/includes/auth.php');
    session_start();

    require_once("../vendor/autoload.php");
    $dotenv = Dotenv\Dotenv::createImmutable('../');
    $dotenv->load();    
    require_once('../src/includes/db_external.php');    
    
    require_once('../src/includes/check_ban.php');   
    $hidden = "";
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
        $getUIDQuery = "SELECT ID_User, username, nama_lengkap, foto, isBanned FROM User WHERE User.username = ?";
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

<main id="main-frame">
        <?php require('../src/includes/views/sideNavbar.php')?>  

        <div class="main-content">
                <form id="search-user" action="explore.php" method="GET"></form>
                <section class="mt-3 main-content-wrapper dashboard-header search-box-header">
                        <div class="row justify-content-center mb-3 search-user-type ">
                            <div class="col-lg-3 col-sm-6 col-8 border border-dark p-2 search-user-type col-user-search">
                                <input class="input-username-login-and-register search-user-type search-user-form" id="login-form-username" type="text" name="u" placeholder="Search People" form="search-user" onkeyup="liveSearch(this.value);" onclick="showSearchResult();">
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
                                <?php if (isset($_SESSION['ADMIN'])){?>
                                    
                                    <div class="admin-user-control-explore mx-3">
                                        <button  class="btn button-bootstrap" onclick="deleteUser('<?=$userID?>')">Delete User</button>


                                        <?php if (!$userInfo['isBanned']){?>
                                            <button class="btn button-bootstrap" onclick="banUserPermanently('<?=$userID?>')">Ban Permanent</button>                                        
                                        <?php } else {?>
                                            <button class="btn button-bootstrap" onclick="unbanUser('<?=$userID?>')">Unban User</button>                                              
                                        <?php }?>
                                    </div>

                                <?php }?>

                        
                        <img class="profile-picture" src="../src/user_profile/<?= !$userInfo['foto'] ? 'no-pfp.webp': htmlspecialchars($userInfo['foto'])?>"/>
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
                            
                            <?php if ($post['nama_gambar']){?>
                                <img class="post-pict-preview" src="../src/user_post_pictures/<?=htmlspecialchars($post['nama_gambar'])?>"/>
                            <?php }?>
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


    <?php if (!isset($_SESSION['ID_User'])){?>
    
    <div id="notif-reminder" class=" fixed-bottom bg-secondary p-3" <?= $hidden ?>>
        <div class="row">
            <div class="col text-white text-center">
                <svg
                xmlns="http://www.w3.org/2000/svg"
                width="32"
                height="32"
                fill="currentColor"
                class="bi bi-instagram mx-1"
                viewBox="0 0 16 16"
                >
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                </svg>
                <span id="reminder-text" class="mx-1">Prolangram</span>
                <span class="mx-1"> | </span>
                <small class="mx-1">Have an Account?</small>
                <button id="reminder-button" class="btn btn-light mx-1" onclick="goToLogin()">Log In</button>
                <small class="mx-1">Don't have an Account?</small>
                <button id="reminder-button" class="btn btn-light mx-1" onclick="goToRegister()">Register</button>
            </div>
        </div>

    <?php }?>
        

    
    <script src="../src/bootstrap/js/bootstrap.min.js"></script>
    <script src="../src/js/script.js"></script>
    <script src="../src/js/handle.js"></script>    
    <script src="../src/js/admin.js"></script>          
</body>
</html>
