<?php
    // GATAU NI KEPAKE ATO GA
    require_once('db.php');

    function getRandomUser(){
        global $db;
        $fetchRandomUserQuery = "SELECT id_user, username, foto FROM user WHERE username != 'admin' ORDER BY RAND() LIMIT 5"; // WHERE (UNLESS DIRI SENDIRI)
        $queryExecution = $db->query($fetchRandomUserQuery);
        $queryResult = [];
        while ($result = $queryExecution->fetch(PDO::FETCH_ASSOC)){
            array_push($queryResult, $result);
        }
    
        return $queryResult;
    } 

    function liveSearch(){
        // AJAX
        global $db;
        $data = json_decode(file_get_contents("php://input"));            
        $query = '%'.$data->query.'%';

        $findUserQuery = "SELECT id_user, username, foto FROM user WHERE username LIKE ? AND username != 'admin'";
        $queryExecution = $db->prepare($findUserQuery);
        $queryExecution->execute([$query]);
        
        $result = [];
        while ($user = $queryExecution->fetch(PDO::FETCH_ASSOC)){
            array_push($result, $user);
        }
        return $result;
    }

    function deleteUser(){
        global $db;
        $data = json_decode(file_get_contents("php://input"));      
        $user_id = $data->user_id;

        $deleteUserQuery = "DELETE FROM user WHERE id_user = ?";
        try{
            $queryExecution = $db->prepare($deleteUserQuery);
            $queryExecution->execute([$user_id]); 
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


    function unbanUser(){
        global $db;
        $data = json_decode(file_get_contents("php://input"));      
        $user_id = $data->user_id;

        $unbanUserQuery = "UPDATE user SET isbanned = 0 WHERE id_user = ?";
        try{
            $queryExecution = $db->prepare($unbanUserQuery);
            $queryExecution->execute([$user_id]); 
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


    function banUserPermanently(){
        global $db;
        $data = json_decode(file_get_contents("php://input"));      
        $user_id = $data->user_id;

        $banUserQuery = "UPDATE user SET isbanned = 1 WHERE id_user = ?";
        try{
            $queryExecution = $db->prepare($banUserQuery);
            $queryExecution->execute([$user_id]); 
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
        if ($q == 'randomuser'){
            $data = getRandomUser();
            echo json_encode($data);
        } else if ($q == 'livesearch'){
            $res = liveSearch();
            echo json_encode($res);  
        } else if ($q == 'deleteuser'){
            $res = deleteUser();
            echo $res;
        } else if ($q == 'banuser'){
            $res = banUserPermanently();
            echo $res;
        } else if ($q == 'unbanuser'){
            $res = unbanUser();
            echo $res;
        }
    }
?>