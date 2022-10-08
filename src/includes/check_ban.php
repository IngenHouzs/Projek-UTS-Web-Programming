<?php 

    if (isset($_SESSION['ID_User'])){
        $user_id = $_SESSION['ID_User'];
        $query = "SELECT isBanned FROM User WHERE ID_User = ?";
        $exec = $db->prepare($query);
        $exec->execute([$user_id]);

        
        $result = $exec->fetch(PDO::FETCH_ASSOC);
        if ($result){
            if ($result['isBanned']){
                session_destroy();
                header('location: login.php');
                die();
            } 
        }

    }

?>