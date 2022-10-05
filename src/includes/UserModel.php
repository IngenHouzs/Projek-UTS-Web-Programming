<?php
    // GATAU NI KEPAKE ATO GA
    require_once('db.php');

    function getRandomUser(){
        global $db;
        $fetchRandomUserQuery = "SELECT ID_User, username, foto FROM User ORDER BY RAND() LIMIT 5"; // WHERE (UNLESS DIRI SENDIRI)
        $queryExecution = $db->query($fetchRandomUserQuery);
        $queryResult = [];
        while ($result = $queryExecution->fetch(PDO::FETCH_ASSOC)){
            array_push($queryResult, $result);
        }
    
        return $queryResult;
    } 

    // REQUEST CHECKER    
    if (isset($_REQUEST['query'])){
        $q = $_REQUEST['query'];
        if ($q = 'randomuser'){
            $data = getRandomUser();
            echo json_encode($data);
        }
    }
?>