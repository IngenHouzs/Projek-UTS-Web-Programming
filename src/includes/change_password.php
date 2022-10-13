<?php 

    require('db.php');

    if (isset($_POST['password']) && isset($_POST['password_check']) && isset($_POST['id'])){
        if ($_POST['password'] != $_POST['password_check']){
            header('location: ../../app/register.php?err=4');
            die();
        }          

        $query = "UPDATE user SET password = ? WHERE ? = user.id_user";

        try{
            $exec = $db->prepare($query);
            $exec->execute([password_hash($_POST['password'], PASSWORD_BCRYPT), $_POST['id']]);

            header('location: ../../app/login.php');
            die();
        } catch(Exception $e){
            header('location: ../../app/login.php');
            die();            
        }




    }



?>