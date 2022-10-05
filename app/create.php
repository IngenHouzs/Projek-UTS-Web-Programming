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

                <form action="../src/includes/create_post_process.php" method="POST" id="post_upload_form" enctype="multipart/form-data">
                </form>     

                <button class="dropdown-button">
                        <img src="../src/assets/instagram.svg"/>
                        Add Post Tag
                </button>

                <div id="post-tag" style="display:none;">
                    <input type="radio" name="tag" value="JavaScript" id="tag-list" form="post_upload_form" required><label for="tag-list">JavaScript</label></input>
                    <input type="radio" name="tag" value="Python" id="tag-list" form="post_upload_form" required><label for="tag-list">Python</label></input>                                                   
                    <input type="radio" name="tag" value="C++" id="tag-list" form="post_upload_form" required><label for="tag-list">C++</label></input>                         
                    <input type="radio" name="tag" value="TypeScript" id="tag-list" form="post_upload_form" required><label for="tag-list">TypeScript</label></input>                         
                    <input type="radio" name="tag" value="PHP" id="tag-list" form="post_upload_form" required><label for="tag-list">PHP</label></input>                         
                    <input type="radio" name="tag" value="Node.js" id="tag-list" form="post_upload_form" required><label for="tag-list">Node.js</label></input>                         
                </div>

                <textarea class="caption-write t_area" name="caption" form="post_upload_form" placeholder="Write your caption..." required></textarea>

                <div id="preview-image">
                    <div class="empty-image">
                        <img src="../src/assets/instagram.svg"/>
                    </div>
                </div>

                <div class="image-post">
                    <label class="addfile" for="pictures">
                        <img src="../src/assets/instagram.svg"/>
                        <p>Add Photo</p>
                    </label>
                    <input type="file" id="pictures" form="post_upload_form" onchange='showImagePreview();' name="foto[]" accept="image/png, image/gif, image/jpeg, image/svg, image/webp, image/bmp, image/gif" multiple hidden></input>
                    <button class="submit-button" type="submit" form="post_upload_form">Post</button>
                </div>
                

            </div>
            <?php require('../src/includes/views/friendRecommendation.php')?>            
        </section>
        <script language="JavaScript" type="text/javascript" src="../src/js/script.js"></script>
</body>
</html>