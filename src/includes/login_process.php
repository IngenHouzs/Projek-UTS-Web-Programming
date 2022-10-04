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

    var_dump($result);

    if ($result){
        $verifyPassword = password_verify($password, $result['password']);
        if ($verifyPassword){
            $_SESSION['ID_User'] = $result['ID_User'];
            $_SESSION['nama_lengkap'] = $result['nama_lengkap'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['email'] = $result['email'];            
            header('location: ../../app/index.php'); 
            die();
        } else {    
            header('location: ../../app/login.php?err=true'); 
            die();
        }
    } else{
        header('location: ../../app/login.php?err=true');
    }
    
?>