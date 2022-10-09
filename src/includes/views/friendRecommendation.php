
<?php 

    // SELALU TAMBAHIN 3 LINE INI KALO MAU DATABASE DARI FOLDER APP
    require_once("../vendor/autoload.php");
    $dotenv = Dotenv\Dotenv::createImmutable('../');
    $dotenv->load();    

    require_once('../src/includes/db_external.php');

    $fetchRandomUserQuery = "SELECT ID_User, username, foto FROM User  WHERE username != ? AND isAdmin = 0 ORDER BY RAND() LIMIT 5"; // WHERE (UNLESS DIRI SENDIRI)
    $queryExecution = $db->prepare($fetchRandomUserQuery);
    if (isset($_SESSION['username'])) $queryExecution->execute([$_SESSION['username']]);
    else $queryExecution->execute(['']);
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

            <?php if($user["foto"]){?>

            <img src="../src/user_profile/<?=htmlspecialchars($user["foto"])?>"/>

            <?php }else{?>
                <img src="../src/user_profile/no-pfp.webp?>"/>
            <?php }?>


            <a href="explore.php?u=<?=htmlspecialchars($user['username'])?>"><?= htmlspecialchars($user["username"])?></a>        
        </div>    

    <?php endforeach?>

</div>