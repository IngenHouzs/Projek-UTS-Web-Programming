
<?php 
    session_start();
    require_once('../src/includes/prevent_login_auth.php');   
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prolangram | Sign Up</title>
</head>
<body>

    <?php 

        if (isset($_GET['err'])){
            if ($_GET['err'] == '1'){
                echo "<h1>Your username is unavailable.</h1>";
            }
            if ($_GET['err'] == '2'){
                echo "<h1>Your Email is already registered.</h1>";
            }
            if ($_GET['err'] == '3'){
                echo "<h1>Failed to insert data</h1>";
            }                        
        }
    ?>

<a href="login.php">Login</a>    

<form action="../src/includes/register_process.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="text" name="fullname" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>                
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Sign Up</button>
    </form>    
</body>
</html>