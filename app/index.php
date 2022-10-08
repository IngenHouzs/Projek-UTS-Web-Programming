
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


<?php 

    require_once("../vendor/autoload.php");
    $dotenv = Dotenv\Dotenv::createImmutable('../');
    $dotenv->load();    

    require_once('../src/includes/db_external.php');    

    // QUERY SORT BY RECENT POST 

    $postTag;

    if (isset($_GET['t'])){
        $postTag = $_GET['t'];

        $getAllPostQuery = "SELECT User.username AS 'username', 
        User.ID_User as 'user_id',        
        Post.waktu_post as 'post_date', 
        Post.KATEGORI as 'kategori', 
        Post.Isi as 'isi', 
        Post.ID_Post as 'id', 
        User.foto as 'foto',
        (SELECT COUNT(ID_Post) FROM Like_Post 
        WHERE ID_Post = Like_Post.ID_Post AND Like_Post.ID_Post = Post.ID_Post) AS 'like',
        (SELECT COUNT(ID_CommentPost) FROM Comment_Post WHERE Comment_Post.ID_CommentPost = ID_CommentPost AND Comment_Post.ID_Post = Post.ID_Post) AS 'comments'              
        FROM Post, User WHERE Post.ID_User = User.ID_User AND Post.KATEGORI = ? 
        ORDER BY Post.waktu_post DESC";        
        $queryExecution = $db->prepare($getAllPostQuery);
        $queryExecution->execute([$postTag]);

    } else {
        $getAllPostQuery = "SELECT User.username AS 'username', 
        User.ID_User as 'user_id',
        Post.waktu_post as 'post_date', 
        Post.KATEGORI as 'kategori', 
        Post.Isi as 'isi', 
        Post.ID_Post as 'id', 
        User.foto as 'foto',
        (SELECT COUNT(ID_Post) FROM Like_Post 
        WHERE ID_Post = Like_Post.ID_Post AND Like_Post.ID_Post = Post.ID_Post) AS 'like',
        (SELECT COUNT(ID_CommentPost) FROM Comment_Post WHERE Comment_Post.ID_CommentPost = ID_CommentPost AND Comment_Post.ID_Post = Post.ID_Post) AS 'comments'              
        FROM Post, User WHERE Post.ID_User = User.ID_User 
        ORDER BY Post.waktu_post DESC";
        $queryExecution = $db->query($getAllPostQuery);        
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../src/bootstrap/css/bootstrap.css">    
    <link rel="stylesheet" href="../src/css/style.css">    
    <title>Prolangram | Dashboard</title>
</head>
<body>
    <main id="main-frame">
        <?php require('../src/includes/views/sideNavbar.php')?>
        <div class="main-content">
                <section class="main-content-wrapper dashboard-header">
                    <h1 class="dashboard-page-title">Home</h1>
                </section>      

                <section id="dashboard-post-list">

                    <!-- FORMAT POST-->
                    <div class="container-fluid">
                        <?php while($post = $queryExecution->fetch(PDO::FETCH_ASSOC)) {?>
                            <div id="post-row" class="row">
                                <div class="col">
                                    <div class="post-wrapper m-auto">
                                        <div class="post-info p-1">
                                            <img id="post-profile-image" onclick="redirectToUserPage('<?=$post['username']?>')" src="../src/user_pfp/<?= !$post['foto'] ? 'no-pfp.webp': $post['foto']?>"/>
                                            <div class="post-info-header p-1 mx-1">
                                                <h1><span id="post-username" onclick="redirectToUserPage('<?=$post['username']?>')"><?=$post['username']?></span> <span id="post-date" style="font-weight:300"> <?=$post['post_date']?></span></h1>
                                                <div class="post-tag">
                                                    <small><?=$post['kategori']?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-description p-1" onclick="redirectToPostPage('<?=$post['id']?>')">
                                            <!-- ini nanti jd carouselanny -->
                                            <div class="post-image"></div>
                                            <p><?=$post['isi']?></p>
                                            <div class="post-reaction">
                                                <div class="post-like">
                                                    <button onclick="likePost('<?=$_SESSION['ID_User']?>', '<?=$post['id']?>')"><img src="../src/assets/like.png" /></button>
                                                    <p><?= $post['like']?></p>
                                                </div>
                                                <div class="post-comment">
                                                    <button><a href="post.php?p=<?=$post['id']?>"><img src="../src/assets/comment.png"/></a></button>
                                                    <p><?=$post['comments']?></p>
                                                </div>                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                    
    
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
    <script src="../src/js/script.js"></script>
    <script src="../src/js/handle.js"></script>    
</body>
</html>