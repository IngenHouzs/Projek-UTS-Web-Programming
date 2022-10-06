
<?php 

    // SELALU TAMBAHIN 3 LINE INI KALO MAU DATABASE DARI FOLDER APP
    require_once("../vendor/autoload.php");
    $dotenv = Dotenv\Dotenv::createImmutable('../');
    $dotenv->load();    

    require_once('../src/includes/db_external.php');

    $fetchRandomUserQuery = "SELECT ID_User, username, foto FROM User  WHERE username != '{$_SESSION['username']}' ORDER BY RAND() LIMIT 5"; // WHERE (UNLESS DIRI SENDIRI)
    $queryExecution = $db->query($fetchRandomUserQuery);
    $queryResult = [];
    while ($result = $queryExecution->fetch(PDO::FETCH_ASSOC)){
        array_push($queryResult, $result);
    }    

?>


<!-- ini dibuang pas 900px -->
<div class="friend-recommendation-section">

    <h5 class="highlight-text">See posts from people around you</h5>

    <?php foreach($queryResult as $user): ?>

        <div class="random-friend-popup-wrapper">
            <img src="../src/user_pfp/<?=$user["foto"]?>"/>
            <a href="index.php"><?= $user["username"]?></a>        
        </div>    

    <?php endforeach?>

</div>