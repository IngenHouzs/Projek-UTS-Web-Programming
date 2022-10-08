
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

    // Get specific information of current post

    $currentPostID = $_GET['p'];

    $getCurrentPostDataQuery = "SELECT User.username AS 'username', 
    Post.waktu_post as 'post_date', 
    Post.KATEGORI as 'kategori', 
    Post.Isi as 'isi', 
    Post.ID_Post as 'id',
    Post.waktu_post as 'waktu_post',
    Post.KATEGORI as 'tag',
    Post.Isi as 'caption',
    User.foto as 'foto',
    (SELECT COUNT(ID_Post) FROM Like_Post WHERE ID_Post = Like_Post.ID_Post AND ID_Post = ?) AS 'like',
    (SELECT COUNT(ID_CommentPost) FROM Comment_Post WHERE Comment_Post.ID_CommentPost = ID_CommentPost AND Comment_Post.ID_Post = ?) AS 'comments'    
    FROM Post, User WHERE Post.ID_User = User.ID_User AND Post.ID_Post = ?";      

    $executeQuery = $db->prepare($getCurrentPostDataQuery);

    $executeQuery->execute([$currentPostID,$currentPostID, $currentPostID]);
    $postInfo = $executeQuery->fetch(PDO::FETCH_ASSOC);



    // Get all comments
    $getAllCommentsQuery = "SELECT Post.ID_Post as 'post',
        User.username AS 'username', 
        Comment_Post.Isi AS 'comment',
        Comment_Post.ID_CommentPost as 'comment_id',
        User.foto AS 'foto', 
        (SELECT COUNT(ID_Like) FROM  Like_Comment WHERE Like_Comment.ID_Comment = Comment_Post.ID_CommentPost)AS 'like_comment'        
        FROM Post, User, Comment_Post
        WHERE Comment_Post.ID_Post = Post.ID_Post AND User.ID_User = Comment_Post.ID_User AND Comment_Post.ID_Post = ?
    ";
    
    $params = [$currentPostID];


    try{
        $queryExecution = $db->prepare($getAllCommentsQuery);
        $queryExecution->execute($params);

    } catch(Exception $e){

    }

    // GET ALL PICTURES
    $pictures = [];    
    if (isset($_GET['p'])){
        $post_id = $_GET['p'];        

        $getAllPicturesQuery = "SELECT
            nama_gambar FROM Gambar_Postingan WHERE ID_Post = ? ORDER BY Urutan
        ";
        try{
            $queryExec = $db->prepare($getAllPicturesQuery);
            $queryExec->execute([$post_id]);
   
            while ($pict = $queryExec->fetch(PDO::FETCH_ASSOC)){
                array_push($pictures, $pict);
            }
        } catch(Exception $e){}

    }

    // GET ALL Post Pictures

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

            <?php if(count($pictures) > 0) {?>

            <div class="user-post-image-wrapper">
                <div class="image-frame">
                    <button onclick="carouselMoveLeft()">&lt;</button>
                    <img src="../src/user_post_pictures/<?=$pictures[0]['nama_gambar']?>"/>
                    <button onclick="carouselMoveRight()">&gt;</button>
                </div>
            </div>
            
            <?php }?>

            <div class="post-wrapper mc-post-wrapper">
                            <div class="post-info">
                                <img src="../src/user_pfp/<?= !$postInfo['foto'] ? 'no-pfp.webp' : $postInfo['foto']?>"/>
                                <div class="post-info-header" onclick="redirectToUserPage('<?=$postInfo['username']?>')">
                                    <h1><?=$postInfo['username']?> <span style="font-weight:300"><?=$postInfo['waktu_post']?></span></h1>
                                    <div class="post-tag">
                                        <h1><?=$postInfo['tag']?></h1>
                                    </div>
                                </div>
                            </div>
                            <div class="post-description mc-post-desc">
                                <!-- ini nanti jd carouselanny -->
                                <p><?=$postInfo['caption']?></p>
                                
                                <div class="post-reaction">
                                    <div class="post-like">
                                        <button onclick="likePost('<?=$_SESSION['ID_User']?>', '<?=$postInfo['id']?>')"><img src="../src/assets/like.png" /></button>
                                        <p><?=$postInfo['like']?></p>
                                    </div>
                                    <div class="post-comment">
                                        <button><a href=""><img src="../src/assets/comment.png"/></a></button>
                                        <p><?= $postInfo['comments']?></p>
                                    </div>                                
                                </div>

                                <section class="post-comments-wrapper">
                                    <h1>Comments</h1>
                                    <div class="comment-box">
                                        
                                        <!-- ini buat comment per user -->

                                        <?php while($comment = $queryExecution->fetch(PDO::FETCH_ASSOC)) {?>
                                        <div class="user-comment-box">
                                            <img src="../src/user_pfp/<?=  !$comment['foto'] ? 'no-pfp.webp' : $comment['foto']?>" onclick="redirectToUserPage('<?=$comment['username']?>')"/>  
                                            <div class="user-comment-text">
                                                <p><span style="font-weight:bold;" onclick="redirectToUserPage('<?=$comment['username']?>')"><?=$comment['username']?></span><?=$comment['comment']?></p>
                                            </div> 

                                            <!-- button like comment -->
                                            <button onclick="likeComment('<?=$_SESSION['ID_User']?>', '<?=$comment['comment_id']?>')"><img src="../src/assets/like.png"/></button>
                                            <p><?=$comment['like_comment']?></p>
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