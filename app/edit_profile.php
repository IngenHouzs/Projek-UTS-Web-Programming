<?php
    require_once('../src/includes/auth.php');

    require_once("../vendor/autoload.php");
   
    $dotenv = Dotenv\Dotenv::createImmutable('../');
    $dotenv->load();    
    require_once('../src/includes/db_external.php');   
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

    $query = "SELECT * FROM user WHERE ID_User = ?";
            
    $data = [$_SESSION['ID_User']];
                        
    $query_call_profile = $db->prepare($query); // siapin query
    $query_call_profile->execute($data); // jalankan hasil query dan ambil data    

    $res = $query_call_profile->fetch(PDO::FETCH_ASSOC); // hasil yang udah diambil
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/bootstrap/css/bootstrap.css">    
    <link rel="stylesheet" href="../src/css/style.css">        
    <title>Prolangram | Edit Profile</title>
</head>
<body>

<main id="main-frame">


        <?php 
            if (isset($_GET['err'])){
              if ($_GET['err'] == 1){
                echo "         <div class='error-msg alert alert-danger'>
                <p>Username sudah digunakan.</p>
                <button onclick='closeErrMsg()'>CLOSE</button>
            </div> ";
              } else if ($_GET['err'] == 2){
                echo "         <div class='error-msg alert alert-danger'>
                <p>Email sudah digunakan.</p>
                <button onclick='closeErrMsg()'>CLOSE</button>
            </div> ";                
              } else if ($_GET['err'] == 3){
                echo "         <div class='error-msg alert alert-danger'>
                <p>Format foto tidak valid.</p>
                <button onclick='closeErrMsg()'>CLOSE</button>
            </div> ";                
              } 
              else if ($_GET['err'] == 'none'){
                echo "         <div class='success-msg alert alert-success'>
                <p>Profil berhasil diubah.</p>
                <button onclick='closeSuccessMsg()'>CLOSE</button>
            </div> ";                
              }              
            }
            ?>


        <?php require('../src/includes/views/sideNavbar.php')?>
        <div class="main-content">
                <section class="main-content-wrapper dashboard-header">
                    <h1 class="dashboard-page-title">Edit Profile</h1>
                </section>      
        
        <!-- ini yang baru -->

        <div class="container my-2">
             <!-- form untuk edit data  -->
            <form enctype="multipart/form-data" method="POST" action="../src/includes/edit_profile_process.php?uid=<?= $user_id ?>">

              <div class="form-group">
                <label for="">Foto Profile</label>
                <input type="file" class="form-control" accept="image/*" name="foto">
              </div>

              <br>

              <div class="form-group">
                <label for="">Username</label>
                <input type="text" class="form-control" name="username" value="<?= $res['username'] ?>" required>
              </div>

              <br>

              <div class="form-group">
                <label for="">Full Name</label>
                <input type="text" class="form-control" name="nama_lengkap" value="<?= $res['nama_lengkap'] ?>" required>
              </div>

              <br>

              <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" value="<?= $res['email'] ?>" required>
              </div>

              <hr>

              <h4>Ubah Password <small>( Opsional )</small></h4>

              <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password">
              </div>

              <hr>
              <button type="submit" class="btn btn-primary button-bootstrap">Submit</button>
              <a class="btn btn-primary button-bootstrap" href="profile.php">Cancel</a>
            </form>
        </div>

       
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
    <script src="../src/js/script.js"></script>
    <script src="../src/js/handle.js"></script>    
</body>
</html>