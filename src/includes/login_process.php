<?php 

    session_start();

    require_once('db.php');

    if (isset($_POST['ADMIN'])){

        if ($_POST['ADMIN'] == 'ADMIN'){
            $identity = $_POST['identity'];
            $password = $_POST['password'];
        
            $query = "SELECT * FROM User WHERE nama_lengkap = ? AND isAdmin = 1";
            
            $data = [$identity];
            
            $queryExecution = $db->prepare($query);
            $queryExecution->execute($data);
        
            $result = $queryExecution->fetch(PDO::FETCH_ASSOC);
        
            if ($result){
                $verifyPassword = password_verify($password, $result['password']);
                if ($verifyPassword){
                    $_SESSION['ID_User'] = $result['ID_User'];
                    $_SESSION['nama_lengkap'] = $result['nama_lengkap'];
                    $_SESSION['username'] = $result['username'];
                    $_SESSION['email'] = '-';           
                    $_SESSION['foto'] = NULL;
                    $_SESSION['ADMIN'] = true;
                    header('location: ../../app/index.php'); 
                    die();
                } else {    
                    header('location: ../../app/admin_login.php?err=true'); 
                    die();
                }
            } else{
                $_SESSION['error'] = 'error';
                header('location: ../../app/admin_login.php?err=true');
            }    
            
            die();
        }
    }
    
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
            
            $isBanned = $result['isBanned'];
            if ($isBanned){
                header('location: ../../app/login.php?err=banned'); 
                die();                
            }

            $_SESSION['ID_User'] = $result['ID_User'];
            $_SESSION['nama_lengkap'] = $result['nama_lengkap'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['email'] = $result['email'];           
            $_SESSION['foto'] = $result['foto'];
            header('location: ../../app/index.php'); 
            die();
        } else {    
            header('location: ../../app/login.php?err=true'); 
            die();
        }
    } else{
        $_SESSION['error'] = 'error';
        header('location: ../../app/login.php?err=true');
    }
    
?>