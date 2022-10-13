<?php 


    require_once('db.php');

    if (isset($_POST['username']) && isset($_POST['fullname']) && isset($_POST['email'])){
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];


        $query = "SELECT id_user FROM user WHERE ? = username AND ? = nama_lengkap AND ? = email";

   
        try{
            $exec = $db->prepare($query);
            $exec->execute([strtolower(join('',explode(' ', $username))), $fullname, $email]);

            $res = $exec->fetch(PDO::FETCH_ASSOC);
            if ($res['id_user']){
    
            } else {
                header('location: ../../app/forget_password.php?err=true');
                die();                
            }
        
        } catch(Exception $e){

        }

        
        

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id="submitId"action="../../app/forget_password.php" method="POST">
        <input type='text' value="<?=$res['id_user']?>" name='id' hidden/>
        <input type="submit" hidden/>
    </form>

    <script>

        document.forms['submitId'].submit();


    </script>

</body>
</html>