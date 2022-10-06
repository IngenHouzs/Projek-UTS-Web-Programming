
<?php
    require_once('../src/includes/auth.php');

    if (!isset($_GET['p'])){
        header('location: index.php');
        die();
    }

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
    <title>Prolangram | View Post</title>
</head>
<body>

<main id="main-frame">
        <?php require('../src/includes/views/sideNavbar.php')?>

        <div class="main-content mc-post">
            <div class="user-post-image-wrapper">
                <div class="image-frame">
                    <img src="../src/user_pfp/goblinlaugh.png"/>
                </div>
            </div>
            <div class="post-wrapper mc-post-wrapper">
                            <div class="post-info">
                                <img src="../src/user_pfp/goblinlaugh.png"/>
                                <div class="post-info-header">
                                    <h1>wkwk <span style="font-weight:300">wkwk</span></h1>
                                    <div class="post-tag">
                                        <h1>wkwk</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="post-description mc-post-desc">
                                <!-- ini nanti jd carouselanny -->
                                <p>AKOWK</p>
                                <div class="post-reaction">
                                    <div class="post-like">
                                        <button onclick=""><img src="../src/assets/like.png" /></button>
                                        <p>wkwkwk</p>
                                    </div>
                                    <div class="post-comment">
                                        <button><a href=""><img src="../src/assets/comment.png"/></a></button>
                                        <p>2000</p>
                                    </div>                                
                                </div>
                                <section class="post-comments-wrapper">
                                    <h1>Comments</h1>
                                    <div class="comment-box">
                                        
                                        <!-- ini buat comment per user -->
                                        <div class="user-comment-box">
                                            <img src="../src/user_pfp/goblinlaugh.png"/>  
                                            <div class="user-comment-text">
                                                <p><span style="font-weight:bold;">Farrel</span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi ipsa rem sint voluptatem officiis et ad delectus suscipit dolorem laborum, illo, numquam alias harum culpa sit sequi odio quod. Voluptas.</p>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>               
        </div> 

     

    
        <?php require('../src/includes/views/friendRecommendation.php')?>
    </main>
    

    <script src="../src/bootstrap/js/bootstrap.min.js"></script>
    <script src="../src/js/script.js"></script>
    <script src="../src/js/handle.js"></script>    
</body>
</html>