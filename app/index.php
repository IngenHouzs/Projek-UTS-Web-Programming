
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

    $getAllPostQuery = "SELECT * FROM Post ORDER BY waktu_post DESC";
    $queryExecution = $db->query($getAllPostQuery);
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

                    <?php while($post = $queryExecution->fetch(PDO::FETCH_ASSOC)) {?>

                        <div class="post-wrapper">
                            <div class="post-info">
                                <img src="../src/user_pfp/goblinlaugh.png"/>
                                <div class="post-info-header">
                                    <h1>farreldinarta <span style="font-weight:300"> 3 minutes ago</span></h1>
                                    <div class="post-tag">
                                        <h1>#JavaScript</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="post-description">
                                <!-- ini nanti jd carouselanny -->
                                <div class="post-image"></div>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta earum quae corrupti, eum ea at nemo incidunt quas natus praesentium. Sequi aut adipisci excepturi corrupti, est placeat pariatur eos officia?</p>
                                <div class="post-reaction">
                                    <div class="post-like">
                                        <button><img src="../src/user_pfp/goblinlaugh.png"/></button>
                                        <p>2000</p>
                                    </div>
                                    <div class="post-comment">
                                        <button><img src="../src/user_pfp/goblinlaugh.png"/></button>
                                        <p>2000</p>
                                    </div>                                
                                </div>
                            </div>
                        </div>

                    <?php }?>

                </section>
        </div>
        <?php require('../src/includes/views/friendRecommendation.php')?>
    </main>

    <script src="../src/bootstrap/js/bootstra.min.js"></script>
    <script src="../src/js/script.js"></script>
</body>
</html>