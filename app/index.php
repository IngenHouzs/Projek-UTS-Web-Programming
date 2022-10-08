
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
        $isAdmin = $_SESSION['ADMIN'];
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
        (SELECT nama_gambar FROM Gambar_Postingan WHERE Urutan = 1 AND Gambar_Postingan.ID_Post = Post.ID_Post) AS nama_gambar,        
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
        (SELECT nama_gambar FROM Gambar_Postingan WHERE Urutan = 1 AND Gambar_Postingan.ID_Post = Post.ID_Post) AS nama_gambar,
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
                                            <img id="post-profile-image" onclick="redirectToUserPage('<?=htmlspecialchars($post['username'])?>')" src="../src/user_pfp/<?= !$post['foto'] ? 'no-pfp.webp': htmlspecialchars($post['foto'])?>"/>
                                            <div class="post-info-header p-1 mx-1">
                                                <h1><span id="post-username" onclick="redirectToUserPage('<?=htmlspecialchars($post['username'])?>')"><?=htmlspecialchars($post['username'])?></span> <span id="post-date" style="font-weight:300"> <?=htmlspecialchars($post['post_date'])?></span></h1>
                                                <div class="post-tag">
                                                    <small>#<?=htmlspecialchars($post['kategori'])?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-description p-1">
                                            <!-- ini nanti jd carouselanny -->

                                            <?php if ($post['nama_gambar']){ ?>
                                            <div class="post-image" onclick="redirectToPostPage('<?=htmlspecialchars($post['id'])?>')">
                                                <img src="../src/user_post_pictures/<?=htmlspecialchars($post['nama_gambar'])?>"/>                                            
                                            </div>
                                            <?php }?>

                                            <div class="post-isi w-100 pt-2">
                                                <p><?=htmlspecialchars($post['isi'])?></p>
                                            </div>

                                            <div class="post-reaction">
                                                <div class="post-like">
                                                    <svg onclick="likePost('<?=htmlspecialchars($_SESSION['ID_User'])?>', '<?=htmlspecialchars($post['id'])?>')" class="button-like" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                        <path d="M96 191.1H32c-17.67 0-32 14.33-32 31.1v223.1c0 17.67 14.33 31.1 32 31.1h64c17.67 0 32-14.33 32-31.1V223.1C128 206.3 113.7 191.1 96 191.1zM512 227c0-36.89-30.05-66.92-66.97-66.92h-99.86C354.7 135.1 360 113.5 360 100.8c0-33.8-26.2-68.78-70.06-68.78c-46.61 0-59.36 32.44-69.61 58.5c-31.66 80.5-60.33 66.39-60.33 93.47c0 12.84 10.36 23.99 24.02 23.99c5.256 0 10.55-1.721 14.97-5.26c76.76-61.37 57.97-122.7 90.95-122.7c16.08 0 22.06 12.75 22.06 20.79c0 7.404-7.594 39.55-25.55 71.59c-2.046 3.646-3.066 7.686-3.066 11.72c0 13.92 11.43 23.1 24 23.1h137.6C455.5 208.1 464 216.6 464 227c0 9.809-7.766 18.03-17.67 18.71c-12.66 .8593-22.36 11.4-22.36 23.94c0 15.47 11.39 15.95 11.39 28.91c0 25.37-35.03 12.34-35.03 42.15c0 11.22 6.392 13.03 6.392 22.25c0 22.66-29.77 13.76-29.77 40.64c0 4.515 1.11 5.961 1.11 9.456c0 10.45-8.516 18.95-18.97 18.95h-52.53c-25.62 0-51.02-8.466-71.5-23.81l-36.66-27.51c-4.315-3.245-9.37-4.811-14.38-4.811c-13.85 0-24.03 11.38-24.03 24.04c0 7.287 3.312 14.42 9.596 19.13l36.67 27.52C235 468.1 270.6 480 306.6 480h52.53c35.33 0 64.36-27.49 66.8-62.2c17.77-12.23 28.83-32.51 28.83-54.83c0-3.046-.2187-6.107-.6406-9.122c17.84-12.15 29.28-32.58 29.28-55.28c0-5.311-.6406-10.54-1.875-15.64C499.9 270.1 512 250.2 512 227z"/>
                                                    </svg>
                                                    <!-- <button ><img src="../src/assets/like.png" /></button> -->
                                                    <p class="mx-2"><?= htmlspecialchars($post['like'])?></p>
                                                </div>
                                                <div class="post-comment">
                                                    <svg onclick="redirectToPostPage('<?=htmlspecialchars($post['id'])?>')" class="button-comment" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                        <path d="M256 32C114.6 32 .0272 125.1 .0272 240c0 47.63 19.91 91.25 52.91 126.2c-14.88 39.5-45.87 72.88-46.37 73.25c-6.625 7-8.375 17.25-4.625 26C5.818 474.2 14.38 480 24 480c61.5 0 109.1-25.75 139.1-46.25C191.1 442.8 223.3 448 256 448c141.4 0 255.1-93.13 255.1-208S397.4 32 256 32zM256.1 400c-26.75 0-53.12-4.125-78.38-12.12l-22.75-7.125l-19.5 13.75c-14.25 10.12-33.88 21.38-57.5 29c7.375-12.12 14.37-25.75 19.88-40.25l10.62-28l-20.62-21.87C69.82 314.1 48.07 282.2 48.07 240c0-88.25 93.25-160 208-160s208 71.75 208 160S370.8 400 256.1 400z"/>
                                                        <a href="post.php?p=<?=htmlspecialchars($post['id'])?>"></a>
                                                    </svg>
                                                    <!-- <button><img src="../src/assets/comment.png"/></button> -->
                                                    <p class="mx-2"><?=htmlspecialchars($post['comments'])?></p>
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
    <script src="../src/js/admin.js"></script>      
</body>
</html>