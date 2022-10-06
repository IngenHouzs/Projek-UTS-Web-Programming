
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

<?php 

    require_once("../vendor/autoload.php");
    $dotenv = Dotenv\Dotenv::createImmutable('../');
    $dotenv->load();    

    require_once('../src/includes/db_external.php');   
    // Get all comments

    $getAllCommentsQuery = "SELECT Post.ID_Post as 'post',
        User.username AS 'username', 
        Comment_Post.Isi AS 'comment',
        User.foto AS 'foto'
        FROM Post, User, Comment_Post
        WHERE Comment_Post.ID_Post = Post.ID_Post AND User.ID_User = Comment_Post.ID_User
    ";
    
    $queryExecution = $db->query($getAllCommentsQuery);

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

                                        <?php while($comment = $queryExecution->fetch(PDO::FETCH_ASSOC)) {?>
                                        <div class="user-comment-box">
                                            <img src="../src/user_pfp/<?=$comment['foto']?>"/>  
                                            <div class="user-comment-text">
                                                <p><span style="font-weight:bold;"><?=$comment['username']?></span><?=$comment['comment']?></p>
                                            </div> 
                                            <button><img src="../src/assets/like.png"/></button>
                                        </div>
                                        <?php }?>
                    
                                
                                    </div>
                                    <form id="add-comment" action="../src/includes/process_comment.php" method="post"></form>
                                    <div class="add-comment-section">
                                        <input name="post_id" value="<?=$_GET['p']?>" hidden form="add-comment"/>
                                        <textarea type="text" name="comment" placeholder="Add comment" form="add-comment" required></textarea>
                                        <button type="submit" form="add-comment">Post</button> 
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