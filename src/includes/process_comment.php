<?php

    session_start();

    if (!isset($_SESSION['id_user'])){
        header('location: ../../app/login.php');
        die();
    }


    require('db.php');    

    // ADD COMMENT TO POST 

    if (
        isset($_SESSION['id_user']) &&
        isset($_SESSION['nama_lengkap']) &&
        isset($_SESSION['username']) &&
        isset($_SESSION['email'])                        
    ){
        
        $comment_id = uniqid('C-', true);   
        $user_id = $_SESSION['id_user']; 
        $post_id = $_POST['post_id'];
        $comment = $_POST['comment'];

        $addCommentQuery = "INSERT INTO comment_post VALUES(?, ?, ?, ?)";        
        $data = [$comment_id, $post_id, $user_id, $comment];
        $executeQuery = $db->prepare($addCommentQuery);
        try{
            $result = $executeQuery->execute($data);
            if ($result){
                header('location: ../../app/post.php?p='.$post_id);   
                die();                
            }
        } catch (Exception $e){
            header('location: ../../app/post.php?p='.$post_id.'&err=1');   
            die();
        }
    } else {
        echo "??";
        die();
    }



?>