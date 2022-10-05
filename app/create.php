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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/bootstrap/css/bootstrap.css">    
    <link rel="stylesheet" href="../src/css/style.css">        
    <title>Prolangram | Create Post</title>
</head>
<body>
        <section id="main-frame">
            <?php require('../src/includes/views/sideNavbar.php')?>
            <div class="main-content">
                <section class="main-content-wrapper dashboard-header">
                    <h1 class="dashboard-page-title">Create Post</h1>
                </section>         

                <form action="../src/includes/create_post_process.php" method="POST" id="post_upload_form">
                </form>     

                <button class="dropdown-button" onclick="showPostTagsOnCreate()">
                        <img src="../src/assets/instagram.svg"/>
                        Add Post Tag
                </button>                

                <textarea class="caption-write t_area" name="caption" form="post_upload_form" placeholder="Write your caption..."></textarea>

                <div id="preview-image">

                </div>

                <div class="image-post">
                    <label class="addfile" for="pictures">
                        <img src="../src/assets/instagram.svg"/>
                        <p>Add Photo</p>
                    </label>
                    <input type="file" id="pictures" form="post_upload_form" onchange='showImagePreview();' multiple hidden></input>
                    <button class="submit-button" type="submit" form="post_upload_form">Post</button>
                </div>
                

            </div>
            <?php require('../src/includes/views/friendRecommendation.php')?>            
        </section>
        <script src="../src/js/script.js"></script>
</body>
</html>