
<div class="side-navbar">

    <!-- Breakpoint Buat Biar Pindah kebawah 796 aja kali ya biar kaya Instagram???

    Kalo di Instagram , dia ilangin tulisan (cuma icon) pas 1250 px
    Pindah kebawah 796 an
    ---->


    <!-- ini kalo diklik mau redirect ke profile juga gak? -->
    <div class="profile-bar">
        <img src="../src/user_pfp/<?=$user_foto?>"/>
        <h1><?=$user_username?></h1>        
    </div>

    <!-- Ini nanti mau bisa di klik gk si semuanya (divnya) (bukan link nya aja)?-->
    <div class="navbar-button">
        <img src="../src/assets/home.png"/>
        <a href="index.php">Home</a>        
    </div>    

    <div class="navbar-button">
        <img src="../src/assets/explore.png"/>
        <a href="explore.php">Explore</a>        
    </div>    
    
    <!-- ini dropdown?-->
    <div class="navbar-button">
        <img src="../src/assets/category.png"/>
        <a href="index.php">Category</a>        
    </div>    

    <div class="navbar-button">
        <img src="../src/assets/create.png"/>
        <a href="create.php">Create</a>        
    </div>        

    <div class="navbar-button">
        <img src="../src/assets/profile.png"/>
        <a href="profile.php">Profile</a>        
    </div>        

    <!-- ini mau popup apa new page??-->    
    <div class="navbar-button">
        <img src="../src/assets/logout.png"/>
        <a href="index.php">Log Out</a>        
    </div>        




</div>