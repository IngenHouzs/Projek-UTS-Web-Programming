<?php
    require_once('../src/includes/auth.php');

    require_once("../vendor/autoload.php");

    if (isset($_SESSION['ADMIN'])){
        if ($_SESSION['ADMIN'] == 'ADMIN'){
            header("location: index.php");
            die();
        }
    }    
          
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


        if (isset($_SESSION['ID_User'])){
   
            // GET POSTS COUNT
    
            $postCountQuery = "SELECT COUNT(*) AS 'jumlah_post' FROM Post WHERE Post.ID_User = ?";
            $queryExecution = $db->prepare($postCountQuery);
            $queryExecution->execute([$user_id]);
    
            $postCount = $queryExecution->fetch(PDO::FETCH_ASSOC);
            
            // GET ALL POSTS
            $getAllPostQuery = "SELECT 
            Post.KATEGORI AS 'tag',
            Post.ISI AS 'caption',
            Post.ID_Post AS 'id', 
            (SELECT nama_gambar FROM Gambar_Postingan WHERE Urutan = 1 AND Gambar_Postingan.ID_Post = Post.ID_Post) AS nama_gambar              
            FROM Post WHERE Post.ID_User = ?";
    
            $getAllPostQueryExecution = $db->prepare($getAllPostQuery);
            $getAllPostQueryExecution->execute([$user_id]);            
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
        


                    <!-- HTML nya disini -->

                    <div class="profile-header">
                        <img class="profile-picture" src="../src/user_pfp/<?= !$user_foto ? 'no-pfp.webp': htmlspecialchars($user_foto)?>"/>
                        <div class="profile-header-desc">
                            <h1><?=htmlspecialchars($user_username)?></h1>
                            <h1><?=htmlspecialchars($user_fullname)?></h1>                            
                            <p><?= htmlspecialchars($postCount['jumlah_post'])?> posts</p>

                            <button class="edit-profile-button" onclick="goToEditProfile()">Edit Profile</button>

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
</body>
</html>
