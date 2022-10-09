<?php 

    session_start();    
    require_once('../src/includes/prevent_login_auth.php');     
    
    $success_register = $error_login = "";
    if(isset($_SESSION['success-register'])){
        $success_register = "<div class='alert alert-success' role='alert'>
        Selamat! Akun telah berhasil dibuat.
      </div>";
    }

    if (isset($_SESSION['error'])){
        $error_login = "<div class='alert alert-danger' role='alert'>
        Credentials and Password does not match!
      </div>"; 
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="initial-scale=1, maximum-scale=1" />

    <title>Prolangram | Log In</title>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../src/bootstrap/css/bootstrap.css">

    <?php 

        

    ?>


    <!-- CSS -->
    <link rel="stylesheet" href="../src/css/style.css">
</head>
<body>
    <main id="main-login">
        <div id="container-login" class="container mt-5">
            <div class="row">
                <div class="col">
                    <?php
                    echo $success_register ;
                    unset($_SESSION['success-register']);
                    ?>
                    <?php
                    echo $error_login ;
                    unset($_SESSION['error']);
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    fill="currentColor"
                    class="bi bi-instagram logo"
                    viewBox="0 0 16 16"
                  >
                    <path
                      d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"
                    />
                  </svg>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <h1 class="font-weight-bold">Prolangram</h1>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <p>Best Community for Code-nerds.</p>
                    <a href="index.php">LOG IN AS GUEST</a>
                </div>
            </div>
            <div class="row mb-1">
                <div class="col d-flex justify-content-center align-items-end pt-3">
                    <small>Don't have account? <strong><a href="register.php">Sign up</a></strong> here.</small>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form action="../src/includes/login_process.php" method="post">
                        <div class="row justify-content-center mb-3">
                            <div class="col-lg-3 col-sm-6 col-8 border border-dark p-2">
                                <input class="input-login-and-register" id="login-form-username" type="text" name="identity" placeholder="Username / Email">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-3 col-sm-6 col-8 border border-dark p-2">
                                <input class="input-login-and-register" id="login-form-password" type="password" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-8 m-auto">
                                <div class="row">
                                    <div class="col">
                                        <small id="forgot-password-login"><a href="#">Forgot Password</a></small>
                                    </div>
                                    <div class="col my-2">
                                        <button id="button-login" class="btn btn-primary w-100 button-login-and-register">Log In</button>
                                    </div>    
                                </div>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
   
        </div>
    </main>
    
    <script src="../src/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>