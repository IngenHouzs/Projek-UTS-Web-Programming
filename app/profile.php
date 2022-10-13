<?php
    require_once('../src/includes/auth.php');

    require_once("../vendor/autoload.php");
   
    $dotenv = Dotenv\Dotenv::createImmutable('../');
    $dotenv->load();    
    require_once('../src/includes/db_external.php');      

    if (
        isset($_SESSION['id_user']) &&
        isset($_SESSION['nama_lengkap']) &&
        isset($_SESSION['username']) &&
        isset($_SESSION['email'])                        
    ){
        $user_id = $_SESSION['id_user'];
        $user_username = $_SESSION['username'];
        $user_fullname = $_SESSION['nama_lengkap'];
        $user_email = $_SESSION['email'];  
        $user_foto = $_SESSION['foto'];
    }


        if (isset($_SESSION['id_user'])){
   
            // GET POSTS COUNT
    
            $postCountQuery = "SELECT COUNT(*) AS 'jumlah_post' FROM post WHERE post.id_user = ?";
            $queryExecution = $db->prepare($postCountQuery);
            $queryExecution->execute([$user_id]);
    
            $postCount = $queryExecution->fetch(PDO::FETCH_ASSOC);
            
            // GET ALL POSTS
            $getAllPostQuery = "SELECT 
            post.kategori AS 'tag',
            post.isi AS 'caption',
            post.id_post AS 'id', 
            (SELECT nama_gambar FROM gambar_postingan WHERE urutan = 1 AND gambar_postingan.id_post = post.id_post) AS nama_gambar              
            FROM post WHERE post.id_user = ?";
    
            $getAllPostQueryExecution = $db->prepare($getAllPostQuery);
            $getAllPostQueryExecution->execute([$user_id]);        


            // ambil profile diri kita sendiri

            $query = "SELECT * FROM user WHERE id_user = ?";
            
            $data = [$_SESSION['id_user']];
                        
            $query_call_profile = $db->prepare($query); // siapin query
            $query_call_profile->execute($data); // jalankan hasil query dan ambil data    

            $res = $query_call_profile->fetch(PDO::FETCH_ASSOC); // hasil yang udah diambil
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
                        <img class="profile-picture" src="../src/user_profile/<?= $res['foto'] ? $res['foto'] : 'no-pfp.webp'?>"/>
                        <div class="profile-header-desc">
                            <h1><?=htmlspecialchars($res['username'])?></h1>
                            <h1><?=htmlspecialchars($res['nama_lengkap'])?></h1>                            
                            <p><?= htmlspecialchars($postCount['jumlah_post'])?> posts</p>

                            <button class="btn edit-profile-button" onclick="goToEditProfile()">Edit Profile</button>

                        </div>
                    </div> 

                    <section class="profile-post-list">
                        <h1 class="my-4">POSTS</h1>

                        <!-- template preview postingan -->


                        <?php while($post = $getAllPostQueryExecution->fetch(PDO::FETCH_ASSOC)){?>

                        <div class="post-preview" onclick="redirectToPostPage('<?=htmlspecialchars($post['id'])?>')">
                            <?php if(isset($post['nama_gambar'])){?>
                                <img class="post-pict-preview" src="../src/user_post_pictures/<?=htmlspecialchars($post['nama_gambar'])?>"/>
                            <?php }?>
                            <div class="post-preview-desc">
                                <span>#<?=htmlspecialchars($post['tag'])?></span>
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
                    <button class="btn btn-primary" onclick="logOut()"><a id="button-yes" href="logout.php">Yes</a></button>
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
