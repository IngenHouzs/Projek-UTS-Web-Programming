<?php 
    require_once('../src/includes/auth.php');

    require_once("../vendor/autoload.php");
    $dotenv = Dotenv\Dotenv::createImmutable('../');
    $dotenv->load();    
    require_once('../src/includes/db_external.php');    
    
    require_once('../src/includes/check_ban.php'); 


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

            <?php 
                if (isset($_GET['err'])){   
                    if ($_GET['err'] == 1){
                        echo "         <div class='error-msg alert alert-danger'>
                        <p>Format gambar tidak valid!</p>
                        <button type='button' class='btn btn-danger' onclick='closeErrMsg()'>CLOSE</button>
                    </div> ";                        
                    }
                    else if ($_GET['err'] == 5){
                        echo "         <div class='error-msg alert alert-danger'>
                        <p>Gagal memasukkan data!</p>
                        <button type='button' class='btn btn-danger' onclick='closeErrMsg()'>CLOSE</button>
                    </div> ";                        
                    }                    
                    else if ($_GET['err'] == 'none'){
                        echo "         <div class='success-msg alert alert-success'>
                        <p>Post berhasil diunggah!</p>
                        <button type='button' class='btn btn-success' onclick='closeSuccessMsg()'>CLOSE</button>
                    </div> ";                        
                    }                      
                }

            ?>



            <?php require('../src/includes/views/sideNavbar.php')?>
            <div class="main-content">
                <section class="main-content-wrapper dashboard-header">
                    <h1 class="dashboard-page-title">Create Post</h1>
                </section>         

                <form action="../src/includes/create_post_process.php" method="POST" id="post_upload_form" enctype="multipart/form-data">
                </form>     

                <button class="dropdown-button">    
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                    <p>Add Post Tag</p>
                </button>

                <div id="post-tag" style="display:none;">
                    <div class="container-fluid">
                        <div class="row row-cols-3 row-cols-sm-2 row-cols-md-3">
                            <div class="col-lg post-tag-col">
                                <fieldset class="post-tag-col">
                                    <input type="radio" name="tag" value="JavaScript" id="tag-list" form="post_upload_form" required> <label for="tag-list">JavaScript</label></input>
                                </fieldset>

                                <fieldset>
                                    <input type="radio" name="tag" value="Python" id="tag-list" form="post_upload_form" required> <label for="tag-list">Python</label></input>       
                                </fieldset>
                            </div>

                            <div class="col-lg post-tag-col">
                                <fieldset class="post-tag-col">
                                    <input type="radio" name="tag" value="CPP" id="tag-list" form="post_upload_form" required> <label for="tag-list">C++</label></input>  
                                </fieldset>

                                <fieldset>
                                    <input type="radio" name="tag" value="TypeScript" id="tag-list" form="post_upload_form" required> <label for="tag-list">TypeScript</label></input> 
                                </fieldset>
                            </div>
                            
                            <div class="col-lg post-tag-col">
                                <fieldset class="post-tag-col">
                                    <input type="radio" name="tag" value="PHP" id="tag-list" form="post_upload_form" required> <label for="tag-list">PHP</label></input>  
                                </fieldset>

                                <fieldset>
                                    <input type="radio" name="tag" value="C" id="tag-list" form="post_upload_form" required> <label for="tag-list">C</label></input>  
                                </fieldset>  
                            </div>

                            <div class="col-lg post-tag-col">
                                <fieldset class="post-tag-col">
                                    <input type="radio" name="tag" value="Java" id="tag-list" form="post_upload_form" required> <label for="tag-list">Java</label></input>  
                                </fieldset>        

                                <fieldset>
                                    <input type="radio" name="tag" value="Ruby" id="tag-list" form="post_upload_form" required> <label for="tag-list">Ruby</label></input>  
                                </fieldset>  
                            </div>

                            <div class="col-lg">
                                <fieldset class="post-tag-col">
                                    <input type="radio" name="tag" value="Dart" id="tag-list" form="post_upload_form" required> <label for="tag-list">Dart</label></input>  
                                </fieldset>           
                                        
                                <fieldset>
                                    <input type="radio" name="tag" value="Kotlin" id="tag-list" form="post_upload_form" required> <label for="tag-list">Kotlin</label></input>  
                                </fieldset>     
                            </div>
                        </div>
                    </div>                       
                </div>

                <div id="textarea-create" class="p-2">
                    <textarea class="caption-write t_area" name="caption" form="post_upload_form" placeholder="Write your caption..." required></textarea>
                </div>

                <div id="preview-image">
                    <div class="empty-image">
                        <img src="../src/assets/instagram.svg"/>
                    </div>
                </div>

                <div class="image-post">
                    <label class="addfile" for="pictures">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                        <p>Add Photo</p>
                    </label>
                    <input type="file" id="pictures" form="post_upload_form" onchange='showImagePreview();' name="foto[]" accept="image/png, image/gif, image/jpeg, image/svg, image/webp, image/bmp, image/gif" multiple hidden></input>
                    <button class="btn button-bootstrap submit-button" type="submit" form="post_upload_form">Post</button>
                </div>
                

            </div>
            <?php require('../src/includes/views/friendRecommendation.php')?>            
        </section>

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

        <script src="../src/js/script.js"></script>
        <script src="../src/js/handle.js"></script>        
        
</body>
</html>