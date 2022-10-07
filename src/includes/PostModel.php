<?php 

    require_once('db.php');    

    function likePost(){
        global $db;
        $data = json_decode(file_get_contents("php://input"));        
        $user_id = $data->user_id;
        $post_id = $data->post_id; 

        // QUERY TO POST LIKE 

        $checkIfLikedQuery = "SELECT * FROM Like_Post WHERE ID_Post = ? AND ID_User = ?";
        $checkIfLikedQueryParams = [$post_id, $user_id];
        $executecheckIfLikedQuery = $db->prepare($checkIfLikedQuery);
        $executecheckIfLikedQuery->execute($checkIfLikedQueryParams);
        $exists = $executecheckIfLikedQuery->fetch(PDO::FETCH_ASSOC);
        if (isset($exists['ID_Post'])){
            $unlikeQuery = "DELETE FROM Like_Post WHERE ID_Post = ? AND ID_User = ?";
            $unlikeQueryParams = [$post_id, $user_id];
            $executeUnlikeQuery = $db->prepare($unlikeQuery);
            try{
                $executeUnlikeQuery->execute($unlikeQueryParams);
                die();
            }catch(Exception $e){
                header('location: ../../app/index.php?err=1');   
                die();
            }
        }


        $like_id = uniqid('L-', true);
        $postLikeQuery = "INSERT INTO Like_Post VALUES (?, ?, ?)";

        $preparedData = [$like_id, $post_id, $user_id];
        $queryExecution = $db->prepare($postLikeQuery);
        try{
            $exec = $queryExecution->execute($preparedData);
            if (!$exec){
                header('location: ../../app/index.php?err=2');            
                die();               
            } 
            
        } catch(Exception $e){
            header('location: ../../app/index.php?err=1');            
            die();
        }

    }


    function likeComment(){
        global $db;
        $data = json_decode(file_get_contents("php://input"));        
        $user_id = $data->user_id;
        $comment_id = $data->comment_id; 

        // LIKE COMMENT
        
        $checkIfLikedQuery = "SELECT * FROM Like_Comment WHERE ID_Comment = ? AND ID_User = ?";
        $checkIfLikedQueryParams = [$comment_id, $user_id];
        $executecheckIfLikedQuery = $db->prepare($checkIfLikedQuery);
        $executecheckIfLikedQuery->execute($checkIfLikedQueryParams);
        $exists = $executecheckIfLikedQuery->fetch(PDO::FETCH_ASSOC);

        if (isset($exists['ID_Comment'])){
            $unlikeQuery = "DELETE FROM Like_Comment WHERE ID_Comment = ? AND ID_User = ?";
            $unlikeQueryParams = [$comment_id, $user_id];
            $executeUnlikeQuery = $db->prepare($unlikeQuery);
            try{
                $executeUnlikeQuery->execute($unlikeQueryParams);
                die();
            }catch(Exception $e){
                header('location: ../../app/index.php?err=1');   
                die();
            }
        }      
        
        
        $like_id = uniqid('LC', true);
        $postLikeQuery = "INSERT INTO Like_Comment VALUES (?, ?, ?)";

        $preparedData = [$like_id, $comment_id, $user_id];
        $queryExecution = $db->prepare($postLikeQuery);
        try{
            $exec = $queryExecution->execute($preparedData);
            if (!$exec){
                header('location: ../../app/index.php?err=2');            
                die();               
            } 
            
        } catch(Exception $e){
            header('location: ../../app/index.php?err=1');            
            die();
        }
        

    }


    // REQUEST CHECKER    
    if (isset($_REQUEST['query'])){
        $q = $_REQUEST['query'];
        if ($q == 'likepost'){
            $data = likePost();
        } else if ($q == 'likecomment'){
            $data = likeComment();
        }
    }    



?>


