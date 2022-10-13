<?php 

    if (isset($_SESSION['id_user'])){
        $user_id = $_SESSION['id_user'];
        $query = "SELECT isbanned FROM user WHERE id_user = ?";
        $exec = $db->prepare($query);
        $exec->execute([$user_id]);

        
        $result = $exec->fetch(PDO::FETCH_ASSOC);
        if ($result){
            if ($result['isbanned'] == 1){
                session_destroy();
                header('location: login.php');
                die();
            } 
        }

    }

?>