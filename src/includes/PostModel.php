<?php 

    require_once('db.php');    

    function likePost(){
        global $db;
        $data = json_decode(file_get_contents("php://input"));        
        $user_id = $data->user_id;
        $post_id = $data->post_id; 

        // QUERY TO POST LIKE 

        $checkIfLikedQuery = "SELECT * FROM like_post WHERE id_post = ? AND id_user = ?";
        $checkIfLikedQueryParams = [$post_id, $user_id];
        $executecheckIfLikedQuery = $db->prepare($checkIfLikedQuery);
        $executecheckIfLikedQuery->execute($checkIfLikedQueryParams);
        $exists = $executecheckIfLikedQuery->fetch(PDO::FETCH_ASSOC);
        if (isset($exists['id_post'])){
            $unlikeQuery = "DELETE FROM like_post WHERE id_post = ? AND id_user = ?";
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
        $postLikeQuery = "INSERT INTO like_post VALUES (?, ?, ?)";

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
        
        $checkIfLikedQuery = "SELECT * FROM like_comment WHERE id_comment = ? AND id_user = ?";
        $checkIfLikedQueryParams = [$comment_id, $user_id];
        $executecheckIfLikedQuery = $db->prepare($checkIfLikedQuery);
        $executecheckIfLikedQuery->execute($checkIfLikedQueryParams);
        $exists = $executecheckIfLikedQuery->fetch(PDO::FETCH_ASSOC);

        if (isset($exists['id_comment'])){
            $unlikeQuery = "DELETE FROM like_comment WHERE id_comment = ? AND id_user = ?";
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
        $postLikeQuery = "INSERT INTO like_comment VALUES (?, ?, ?)";

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


    function deletePost(){
        global $db;
        $data = json_decode(file_get_contents("php://input"));      
        $post_id = $data->post_id;

        $deletePostQuery = "DELETE FROM post WHERE id_post = ?";

        try{
            $queryExecution = $db->prepare($deletePostQuery);
            $queryExecution->execute([$post_id]); 
            $getOldPictures = "SELECT GROUP_CONCAT(gambar_postingan.nama_gambar) AS 'gambar' FROM gambar_postingan WHERE ? = gambar_postingan.id_post";            

            $exec = $db->prepare($getOldPictures);
            $exec->execute([$post_id]); 

            $result = $exec->fetch(PDO::FETCH_ASSOC);
            $pictList = explode(",", $result);
            foreach($pictList as $pict){
                unlink("../user_post_pictures/$pict");
            }            
        } catch(Exception $e){
            $err = [
                "status" => "fail"
            ];
            return json_encode($err);
        }

        $success = [
            "status" => "success"
        ];
        return json_encode($success);
    }


    function deleteComment(){
        global $db;
        $data = json_decode(file_get_contents("php://input"));      
        $comment_id = $data->comment_id;

        $deleteCommentQuery = "DELETE FROM comment_post WHERE id_commentpost = ?";
        try{
            $queryExecution = $db->prepare($deleteCommentQuery);
            $queryExecution->execute([$comment_id]); 
        } catch(Exception $e){
            $err = [
                "status" => "fail"
            ];
            return json_encode($err);
        }

        $success = [
            "status" => "success"
        ];
        return json_encode($success);        
    }


    // REQUEST CHECKER    
    if (isset($_REQUEST['query'])){
        $q = $_REQUEST['query'];
        if ($q == 'likepost'){
            $data = likePost();
        } else if ($q == 'likecomment'){
            $data = likeComment();
        } else if ($q == 'deletepost'){
            $result = deletePost();
            echo $result;
        } else if ($q == 'deletecomment'){
            $result = deleteComment();
            echo $result;
        }
    }    



?>


