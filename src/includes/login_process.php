<?php 

    session_start();

    require_once('db.php');
    
    $identity = strtolower($_POST['identity']);
    $password = $_POST['password'];

    $query = "SELECT * FROM User WHERE email = ? OR username= ?";
    
    $data = [$identity, $identity];
    
    $queryExecution = $db->prepare($query);
    $queryExecution->execute($data);

    $result = $queryExecution->fetch(PDO::FETCH_ASSOC);

    if ($result){
        $verifyPassword = password_verify($password, $result['password']);
        if ($verifyPassword){
            $_SESSION['id_user'] = $result['id_user'];
            $_SESSION['nama_lengkap'] = $result['nama_lengkap'];
            $_SESSION['username'] = $result['username'];
            header('location: ../../app/index.php'); 
            die();
        } else {    
            header('location: ../../app/login.php?err=true');
        }
    } else{
        header('location: ../../app/login.php?err=true');
    }
    
?>