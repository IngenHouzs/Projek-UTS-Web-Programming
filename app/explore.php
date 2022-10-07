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
            Post.ID_Post AS 'id'
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
                <section class="main-content-wrapper dashboard-header search-box-header">
                        <div class="row justify-content-center mb-3 search-user-type">
                            <div class="col-lg-3 col-sm-6 col-8 border border-dark p-2 search-user-type">
                                <input class="input-login-and-register search-user-type search-user-form" id="login-form-username" type="text" name="u" placeholder="Search People" form="search-user" onkeyup="liveSearch(this.value);" onclick="showSearchResult();">
                            </div>
                        </div>      
                        <div class="search-box" style="display:none;">
                            <!-- jangan diilangin -->                                                  
                        </div>
                        <button type="submit" form="search-user">Search</button>           
                </section>             

                <?php 
                    if (isset($_GET['u']) && isset($userInfo['ID_User'])){
                    // kerjain view post disini ?>

                    <!-- HTML nya disini -->

                    <div class="profile-header">
                        <img class="profile-picture" src="../src/user_pfp/<?= !$userInfo['foto'] ? 'no-pfp.webp': $userInfo['foto']?>"/>
                        <div class="profile-header-desc">
                            <h1><?=$userInfo['username']?></h1>
                            <h1><?=$userInfo['nama_lengkap']?></h1>                            
                            <p><?=$postCount['jumlah_post']?> posts</p>
                        </div>
                    </div> 

                    <section class="profile-post-list">
                        <h1>POSTS</h1>

                        <!-- template preview postingan -->


                        <?php while($post = $getAllPostQueryExecution->fetch(PDO::FETCH_ASSOC)){?>

                        <div class="post-preview" onclick="redirectToPostPage('<?=$post['id']?>')">
                            <img class="post-pict-preview" src="../src/user_pfp/goblinlaugh.png"/>
                            <div class="post-preview-desc">
                                <h1>#<?=$post['tag']?></h1>
                                <p><?=$post['caption']?></p>
                            </div>
                        </div>
                
                        <?php }?>


                    </section>



                <?php }?>

        </div>
        <?php require('../src/includes/views/friendRecommendation.php')?>
    </main>
    

    <script src="../src/bootstrap/js/bootstrap.min.js"></script>
    <script src="../src/js/handle.js"></script>      
    <script src="../src/js/script.js"></script>
</body>
</html>
