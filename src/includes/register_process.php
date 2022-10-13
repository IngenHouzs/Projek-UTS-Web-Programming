<?php 

    session_start();

    require_once('db.php');


    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];



    $id = uniqid('U-', true);
    $encrypted_password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $query = "INSERT INTO user VALUES (?, ?, ?, ?, ?,?, ?,?)";

    $data = [$id, $fullname, strtolower(join('',explode(' ', $username))), $email, NULL,FALSE,FALSE,$encrypted_password];

    $queryExecution = $db->prepare($query);


    try{
        if ($_POST['password'] != $_POST['password_check']){
            header('location: ../../app/register.php?err=4');
            die();
        }        
        $queryExecution->execute($data);
        $_SESSION['success-register'] = 'success-register';
        header('location: ../../app/login.php');
    } catch (Exception $e){
        $checkDuplicateUsername = "SELECT COUNT(*) AS 'Count' FROM user WHERE username = '$username'";        
        $checkDuplicateEmail = "SELECT COUNT(*) AS 'Count' FROM user WHERE email = '$email'"; 

        // Cek duplikat username
        $checkDuplicateUsernameExecution = $db->query($checkDuplicateUsername);
        $fetchUsernameQuery =  $checkDuplicateUsernameExecution->fetch(PDO::FETCH_ASSOC);

        if ($fetchUsernameQuery['Count'] > 0){
            header('location: ../../app/register.php?err=1');            
            die();
        }
        
        // Cek duplikat email
        $checkDuplicateEmailExecution = $db->query($checkDuplicateEmail);
        $fetchEmaiQuery = $checkDuplicateEmailExecution->fetch(PDO::FETCH_ASSOC);        

        if ($fetchEmaiQuery['Count'] > 0){
    
            header('location: ../../app/register.php?err=2');            
            die();
        }
        $_SESSION['error'] = 'error';
        header('location: ../../app/register.php?err=3');
    }

?>