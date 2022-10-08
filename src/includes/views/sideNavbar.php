<div id="overlay-navbar-mobile" hidden>
    <div id="new-side-bar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <div class="new-profile-bar mb-1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col text-center">
                    <img src="../src/user_pfp/<?= !$user_foto ? 'no-pfp.webp': htmlspecialchars($user_foto)?>"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col m-auto text-center">
                    <h5><?=htmlspecialchars($user_username)?></h5>        
                    </div>
                </div>
            </div>
        </div>

        <div class="new-navbar-button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c.2 35.5-28.5 64.3-64 64.3H128.1c-35.3 0-64-28.7-64-64V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24zM352 224c0-35.3-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64s64-28.7 64-64zm-96 96c-44.2 0-80 35.8-80 80c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16c0-44.2-35.8-80-80-80H256z"/></svg>
            <a href="index.php">Home</a>        
        </div>    

        <div class="new-navbar-button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M288 32c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9L306.7 128 169.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L352 173.3l41.4 41.4c9.2 9.2 22.9 11.9 34.9 6.9s19.8-16.6 19.8-29.6V64c0-17.7-14.3-32-32-32H288zM80 64C35.8 64 0 99.8 0 144V400c0 44.2 35.8 80 80 80H336c44.2 0 80-35.8 80-80V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v80c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V144c0-8.8 7.2-16 16-16h80c17.7 0 32-14.3 32-32s-14.3-32-32-32H80z"/></svg>
            <a href="explore.php">Explore</a>        
        </div>    
        
        <div class="new-navbar-button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M288 32c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9L306.7 128 169.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L352 173.3l41.4 41.4c9.2 9.2 22.9 11.9 34.9 6.9s19.8-16.6 19.8-29.6V64c0-17.7-14.3-32-32-32H288zM80 64C35.8 64 0 99.8 0 144V400c0 44.2 35.8 80 80 80H336c44.2 0 80-35.8 80-80V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v80c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V144c0-8.8 7.2-16 16-16h80c17.7 0 32-14.3 32-32s-14.3-32-32-32H80z"/></svg>
            <a href="#" onclick="categoryDropdownToggleMobile()">Category</a>        
        </div>   

        <div class="category-dropdown-m" style="display:none;">
            <div class="dropdown-category-btn" onclick="postCategoryQuery('JavaScript')">
                <img src="../src/assets/like.png"/>
                <h1>JavaScript</h1>
            </div>     
            <div class="dropdown-category-btn" onclick="postCategoryQuery('Python')">
                <img src="../src/assets/like.png"/>
                <h1>Python</h1>            
            </div>             
            <div class="dropdown-category-btn" onclick="postCategoryQuery('CPP')">
                <img src="../src/assets/like.png"/>
                <h1>C++</h1>
            </div>          
            <div class="dropdown-category-btn" onclick="postCategoryQuery('TypeScript')">
                <img src="../src/assets/like.png"/>
                <h1>TypeScript</h1>
            </div>                
            <div class="dropdown-category-btn" onclick="postCategoryQuery('PHP')">
                <img src="../src/assets/like.png"/>
                <h1>PHP</h1>
            </div>          
            <div class="dropdown-category-btn" onclick="postCategoryQuery('C')">
                <img src="../src/assets/like.png"/>
                <h1>C</h1>
            </div>        
            <div class="dropdown-category-btn" onclick="postCategoryQuery('Java')">
                <img src="../src/assets/like.png"/>
                <h1>Java</h1>
            </div>           
            <div class="dropdown-category-btn" onclick="postCategoryQuery('Ruby')">
                <img src="../src/assets/like.png"/>
                <h1>Ruby</h1>
            </div>           
            <div class="dropdown-category-btn" onclick="postCategoryQuery('Dart')">
                <img src="../src/assets/like.png"/>
                <h1>Dart</h1>
            </div>           
            <div class="dropdown-category-btn" onclick="postCategoryQuery('Kotlin')">
                <img src="../src/assets/like.png"/>
                <h1>Kotlin</h1>
            </div>                     
        </div>    

        <?php if (!isset($_SESSION['ADMIN'])){?>

        <div class="new-navbar-button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM200 344V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H248v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
            <a href="create.php">Create</a>        
        </div>        

        <div class="new-navbar-button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
            <a href="profile.php">Profile</a>        
        </div>         

        <?php }?>

        <div class="new-navbar-button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96C43 32 0 75 0 128V384c0 53 43 96 96 96h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H96c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32h64zM504.5 273.4c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22v72H192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32H320v72c0 9.6 5.7 18.2 14.5 22s19 2 26-4.6l144-136z"/></svg>
            <a id="logout-mobile" href="#">Log Out</a>        
        </div>
    </div>
</div>



<div class="side-navbar">
    <div class="navbar-button-collapse">
        <button id="openbtn" class="openbtn">☰</button> 
    </div>
    
    <!-- Breakpoint Buat Biar Pindah kebawah 796 aja kali ya biar kaya Instagram???

    Kalo di Instagram , dia ilangin tulisan (cuma icon) pas 1250 px
    Pindah kebawah 796 an
    ---->

    <!-- ini kalo diklik mau redirect ke profile juga gak? -->
    <!-- gk ush gk si soalnya udah ada pilihan profile di navbar -->
    <div class="profile-bar">
        <img src="../src/user_pfp/<?= !$user_foto ? 'no-pfp.webp': htmlspecialchars($user_foto)?>"/>
        <h1><?=htmlspecialchars($user_username)?></h1>        
    </div>

    <!-- Ini nanti mau bisa di klik gk si semuanya (divnya) (bukan link nya aja)?-->
    <div class="navbar-button">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c.2 35.5-28.5 64.3-64 64.3H128.1c-35.3 0-64-28.7-64-64V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24zM352 224c0-35.3-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64s64-28.7 64-64zm-96 96c-44.2 0-80 35.8-80 80c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16c0-44.2-35.8-80-80-80H256z"/></svg>
        <a href="index.php">Home</a>        
    </div>    

    <div class="navbar-button">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M288 32c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9L306.7 128 169.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L352 173.3l41.4 41.4c9.2 9.2 22.9 11.9 34.9 6.9s19.8-16.6 19.8-29.6V64c0-17.7-14.3-32-32-32H288zM80 64C35.8 64 0 99.8 0 144V400c0 44.2 35.8 80 80 80H336c44.2 0 80-35.8 80-80V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v80c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V144c0-8.8 7.2-16 16-16h80c17.7 0 32-14.3 32-32s-14.3-32-32-32H80z"/></svg>
        <a href="explore.php">Explore</a>        
    </div>    
    
    <!-- ini dropdown?-->
    <!-- ya -->
    <div class="navbar-button nav-category">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z"/></svg>
        <a href="#" onclick="categoryDropdownToggle()">Category</a>        
    </div>    

    <div class="category-dropdown" style="display:none;">
        <div class="dropdown-category-btn" onclick="postCategoryQuery('JavaScript')">
            <img src="../src/assets/like.png"/>
            <h1>JavaScript</h1>
        </div>     
        <div class="dropdown-category-btn" onclick="postCategoryQuery('Python')">
            <img src="../src/assets/like.png"/>
            <h1>Python</h1>            
        </div>             
        <div class="dropdown-category-btn" onclick="postCategoryQuery('CPP')">
            <img src="../src/assets/like.png"/>
            <h1>C++</h1>
        </div>          
        <div class="dropdown-category-btn" onclick="postCategoryQuery('TypeScript')">
            <img src="../src/assets/like.png"/>
            <h1>TypeScript</h1>
        </div>                
        <div class="dropdown-category-btn" onclick="postCategoryQuery('PHP')">
            <img src="../src/assets/like.png"/>
            <h1>PHP</h1>
        </div>          
        <div class="dropdown-category-btn" onclick="postCategoryQuery('C')">
            <img src="../src/assets/like.png"/>
            <h1>C</h1>
        </div>        
        <div class="dropdown-category-btn" onclick="postCategoryQuery('Java')">
            <img src="../src/assets/like.png"/>
            <h1>Java</h1>
        </div>           
        <div class="dropdown-category-btn" onclick="postCategoryQuery('Ruby')">
            <img src="../src/assets/like.png"/>
            <h1>Ruby</h1>
        </div>           
        <div class="dropdown-category-btn" onclick="postCategoryQuery('Dart')">
            <img src="../src/assets/like.png"/>
            <h1>Dart</h1>
        </div>           
        <div class="dropdown-category-btn" onclick="postCategoryQuery('Kotlin')">
            <img src="../src/assets/like.png"/>
            <h1>Kotlin</h1>
        </div>                     
    </div>

    <?php if (!isset($_SESSION['ADMIN'])){?>

    <div class="navbar-button">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM200 344V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H248v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
        <a href="create.php">Create</a>        
    </div>        

    <div class="navbar-button">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
        <a href="profile.php">Profile</a>        
    </div>        

    <?php }?>
 
    <div class="navbar-button">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96C43 32 0 75 0 128V384c0 53 43 96 96 96h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H96c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32h64zM504.5 273.4c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22v72H192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32H320v72c0 9.6 5.7 18.2 14.5 22s19 2 26-4.6l144-136z"/></svg>
        <a id="logout-website" href="#">Log Out</a>        
    </div>        
</div>