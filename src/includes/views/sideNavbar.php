<div id="overlay-navbar-mobile" hidden>
    <div id="new-side-bar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <div class="new-profile-bar mb-1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col text-center">

                    <?php 
            if (isset($_SESSION['ID_User'])){
        ?>
            <img src="../src/user_pfp/<?= !$user_foto ? 'no-pfp.webp': htmlspecialchars($user_foto)?>"/>      
        <?php } else{?>
            <img src="../src/user_pfp/no-pfp.webp"/>          
        <?php }?>                            
                    </div>
                </div>
                <div class="row">
                    <div class="col m-auto text-center">
        <?php 
            if (isset($_SESSION['username'])){
        ?>
        <h1><?=htmlspecialchars($user_username)?></h1>        
        <?php } else{?>
            <h1>GUEST</h1>              
        <?php }?>      
                    </div>
                </div>
            </div>
        </div>


        <?php if(isset($_SESSION['ADMIN'])){?>
            <div class="new-navbar-button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c.2 35.5-28.5 64.3-64 64.3H128.1c-35.3 0-64-28.7-64-64V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24zM352 224c0-35.3-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64s64-28.7 64-64zm-96 96c-44.2 0-80 35.8-80 80c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16c0-44.2-35.8-80-80-80H256z"/></svg>
            <a href="admin_panel.php">Panel</a>        
        </div>                
            
        <?php }?>

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
                <svg class="dropdown-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zM243.8 381.4c0 43.6-25.6 63.5-62.9 63.5-33.7 0-53.2-17.4-63.2-38.5l34.3-20.7c6.6 11.7 12.6 21.6 27.1 21.6 13.8 0 22.6-5.4 22.6-26.5V237.7h42.1v143.7zm99.6 63.5c-39.1 0-64.4-18.6-76.7-43l34.3-19.8c9 14.7 20.8 25.6 41.5 25.6 17.4 0 28.6-8.7 28.6-20.8 0-14.4-11.4-19.5-30.7-28l-10.5-4.5c-30.4-12.9-50.5-29.2-50.5-63.5 0-31.6 24.1-55.6 61.6-55.6 26.8 0 46 9.3 59.8 33.7L368 290c-7.2-12.9-15-18-27.1-18-12.3 0-20.1 7.8-20.1 18 0 12.6 7.8 17.7 25.9 25.6l10.5 4.5c35.8 15.3 55.9 31 55.9 66.2 0 37.8-29.8 58.6-69.7 58.6z"/>
                </svg>
                <h1>JavaScript</h1>
            </div>     
            <div class="dropdown-category-btn" onclick="postCategoryQuery('Python')">
                <svg class="dropdown-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path d="M439.8 200.5c-7.7-30.9-22.3-54.2-53.4-54.2h-40.1v47.4c0 36.8-31.2 67.8-66.8 67.8H172.7c-29.2 0-53.4 25-53.4 54.3v101.8c0 29 25.2 46 53.4 54.3 33.8 9.9 66.3 11.7 106.8 0 26.9-7.8 53.4-23.5 53.4-54.3v-40.7H226.2v-13.6h160.2c31.1 0 42.6-21.7 53.4-54.2 11.2-33.5 10.7-65.7 0-108.6zM286.2 404c11.1 0 20.1 9.1 20.1 20.3 0 11.3-9 20.4-20.1 20.4-11 0-20.1-9.2-20.1-20.4.1-11.3 9.1-20.3 20.1-20.3zM167.8 248.1h106.8c29.7 0 53.4-24.5 53.4-54.3V91.9c0-29-24.4-50.7-53.4-55.6-35.8-5.9-74.7-5.6-106.8.1-45.2 8-53.4 24.7-53.4 55.6v40.7h106.9v13.6h-147c-31.1 0-58.3 18.7-66.8 54.2-9.8 40.7-10.2 66.1 0 108.6 7.6 31.6 25.7 54.2 56.8 54.2H101v-48.8c0-35.3 30.5-66.4 66.8-66.4zm-6.7-142.6c-11.1 0-20.1-9.1-20.1-20.3.1-11.3 9-20.4 20.1-20.4 11 0 20.1 9.2 20.1 20.4s-9 20.3-20.1 20.3z"/>
                </svg>
                <h1>Python</h1>            
            </div>             
            <div class="dropdown-category-btn" onclick="postCategoryQuery('CPP')">
                <img class="cplusplus" src="../src/assets/cplusplus.png"/>
                <h1>C++</h1>
            </div>          
            <div class="dropdown-category-btn" onclick="postCategoryQuery('TypeScript')">
                <svg class="dropdown-icon-2" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                    width="24" height="24"
                    viewBox="0 0 172 172"
                    style=" fill:#000000;">
                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                        <path d="M0,172v-172h172v172z" fill="none"></path>
                        <g fill="#000000">
                            <path d="M21.5,21.5v129h129v-129zM97.93967,89.23217h-15.179v46.9345h-12.2335v-46.9345h-14.86367v-10.39883h42.27617zM100.319,133.48633v-12.54883c0,0 6.85133,5.16717 15.07867,5.16717c8.22733,0 7.90483,-5.375 7.90483,-6.11317c0,-7.8045 -23.29883,-7.8045 -23.29883,-25.0905c0,-23.51383 33.9485,-14.233 33.9485,-14.233l-0.42283,11.17283c0,0 -5.69033,-3.79833 -12.126,-3.79833c-6.4285,0 -8.7505,3.06017 -8.7505,6.32817c0,8.43517 23.51383,7.5895 23.51383,24.56733c0,26.144 -35.84767,14.54833 -35.84767,14.54833z"></path>
                        </g>
                    </g>
                </svg>
                <h1>TypeScript</h1>
            </div>                
            <div class="dropdown-category-btn" onclick="postCategoryQuery('PHP')">
                <svg class="dropdown-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path d="M320 104.5c171.4 0 303.2 72.2 303.2 151.5S491.3 407.5 320 407.5c-171.4 0-303.2-72.2-303.2-151.5S148.7 104.5 320 104.5m0-16.8C143.3 87.7 0 163 0 256s143.3 168.3 320 168.3S640 349 640 256 496.7 87.7 320 87.7zM218.2 242.5c-7.9 40.5-35.8 36.3-70.1 36.3l13.7-70.6c38 0 63.8-4.1 56.4 34.3zM97.4 350.3h36.7l8.7-44.8c41.1 0 66.6 3 90.2-19.1 26.1-24 32.9-66.7 14.3-88.1-9.7-11.2-25.3-16.7-46.5-16.7h-70.7L97.4 350.3zm185.7-213.6h36.5l-8.7 44.8c31.5 0 60.7-2.3 74.8 10.7 14.8 13.6 7.7 31-8.3 113.1h-37c15.4-79.4 18.3-86 12.7-92-5.4-5.8-17.7-4.6-47.4-4.6l-18.8 96.6h-36.5l32.7-168.6zM505 242.5c-8 41.1-36.7 36.3-70.1 36.3l13.7-70.6c38.2 0 63.8-4.1 56.4 34.3zM384.2 350.3H421l8.7-44.8c43.2 0 67.1 2.5 90.2-19.1 26.1-24 32.9-66.7 14.3-88.1-9.7-11.2-25.3-16.7-46.5-16.7H417l-32.8 168.7z"/>
                </svg>
                <h1>PHP</h1>
            </div>          
            <div class="dropdown-category-btn" onclick="postCategoryQuery('C')">
                <svg class="dropdown-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path d="M329.1 142.9c-62.5-62.5-155.8-62.5-218.3 0s-62.5 163.8 0 226.3s155.8 62.5 218.3 0c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3c-87.5 87.5-221.3 87.5-308.8 0s-87.5-229.3 0-316.8s221.3-87.5 308.8 0c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0z"/>
                </svg>
                <h1>C</h1>
            </div>        
            <div class="dropdown-category-btn" onclick="postCategoryQuery('Java')">
                <svg class="dropdown-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path d="M277.74 312.9c9.8-6.7 23.4-12.5 23.4-12.5s-38.7 7-77.2 10.2c-47.1 3.9-97.7 4.7-123.1 1.3-60.1-8 33-30.1 33-30.1s-36.1-2.4-80.6 19c-52.5 25.4 130 37 224.5 12.1zm-85.4-32.1c-19-42.7-83.1-80.2 0-145.8C296 53.2 242.84 0 242.84 0c21.5 84.5-75.6 110.1-110.7 162.6-23.9 35.9 11.7 74.4 60.2 118.2zm114.6-176.2c.1 0-175.2 43.8-91.5 140.2 24.7 28.4-6.5 54-6.5 54s62.7-32.4 33.9-72.9c-26.9-37.8-47.5-56.6 64.1-121.3zm-6.1 270.5a12.19 12.19 0 0 1-2 2.6c128.3-33.7 81.1-118.9 19.8-97.3a17.33 17.33 0 0 0-8.2 6.3 70.45 70.45 0 0 1 11-3c31-6.5 75.5 41.5-20.6 91.4zM348 437.4s14.5 11.9-15.9 21.2c-57.9 17.5-240.8 22.8-291.6.7-18.3-7.9 16-19 26.8-21.3 11.2-2.4 17.7-2 17.7-2-20.3-14.3-131.3 28.1-56.4 40.2C232.84 509.4 401 461.3 348 437.4zM124.44 396c-78.7 22 47.9 67.4 148.1 24.5a185.89 185.89 0 0 1-28.2-13.8c-44.7 8.5-65.4 9.1-106 4.5-33.5-3.8-13.9-15.2-13.9-15.2zm179.8 97.2c-78.7 14.8-175.8 13.1-233.3 3.6 0-.1 11.8 9.7 72.4 13.6 92.2 5.9 233.8-3.3 237.1-46.9 0 0-6.4 16.5-76.2 29.7zM260.64 353c-59.2 11.4-93.5 11.1-136.8 6.6-33.5-3.5-11.6-19.7-11.6-19.7-86.8 28.8 48.2 61.4 169.5 25.9a60.37 60.37 0 0 1-21.1-12.8z"/>
                </svg>
                <h1>Java</h1>
            </div>           
            <div class="dropdown-category-btn" onclick="postCategoryQuery('Ruby')">
                <svg class="dropdown-icon-2" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                width="24" height="24"
                viewBox="0 0 50 50"
                style=" fill:#000000;">
                    <path d="M 3.125 23.160156 L 8.183594 14.480469 C 8.230469 14.394531 8.292969 14.316406 8.363281 14.253906 L 17.441406 5.792969 C 17.539063 5.703125 17.65625 5.632813 17.78125 5.585938 L 25.578125 2.722656 L 32.152344 7.316406 L 28.878906 17.722656 L 16.597656 29.132813 L 6.582031 31.378906 Z M 7.296875 33.269531 L 11.96875 46.628906 L 15.8125 31.355469 Z M 42.484375 2.875 L 35.074219 6.992188 L 47.355469 15.910156 C 47.613281 14.761719 47.914063 13.195313 47.984375 11.863281 C 47.980469 11.847656 47.980469 11.828125 47.980469 11.808594 C 48.019531 9.910156 47.707031 7.925781 46.675781 6.210938 C 45.75 4.667969 44.359375 3.539063 42.535156 2.828125 C 42.519531 2.84375 42.507813 2.863281 42.484375 2.875 Z M 34.375 35.578125 L 29.296875 20.058594 L 18.988281 29.644531 Z M 31.144531 19.269531 L 36.1875 34.679688 C 40.132813 30.386719 44.171875 25.246094 46.476563 18.925781 Z M 45.382813 16.949219 L 33.851563 8.578125 L 31.117188 17.269531 Z M 5.761719 34.9375 L 2.335938 40.816406 C 3.507813 46.242188 7.566406 47.457031 10.242188 47.753906 Z M 4.878906 32.484375 L 2 25.644531 L 2 37.421875 Z M 39.921875 2.011719 C 39.90625 2.007813 39.890625 2 39.871094 2 L 28.039063 2 L 33.3125 5.6875 Z M 17.875 31.355469 L 13.777344 47.632813 C 22.109375 46.40625 28.359375 41.929688 33.425781 37.355469 Z M 44.546875 45.648438 C 44.3125 45.648438 44.074219 45.566406 43.882813 45.398438 L 35.617188 38.058594 C 31.984375 41.429688 27.742188 44.855469 22.519531 47.164063 L 44.5625 45.667969 C 44.691406 45.660156 44.8125 45.621094 44.925781 45.570313 C 44.804688 45.621094 44.675781 45.648438 44.546875 45.648438 Z M 37.0625 36.667969 L 45.210938 43.902344 C 45.382813 44.054688 45.472656 44.253906 45.511719 44.460938 L 47.195313 22.414063 C 44.582031 28.078125 40.742188 32.730469 37.0625 36.667969 Z"></path>
                </svg>
                <h1>Ruby</h1>
            </div>           
            <div class="dropdown-category-btn" onclick="postCategoryQuery('Dart')">
                <svg class="dropdown-icon-2" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                width="48" height="48"
                viewBox="0 0 172 172"
                style=" fill:#000000;">
                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><path d="M35.83333,43l10.75,89.58333l-28.73475,-28.73475c-4.26058,-4.26058 -5.40367,-10.73567 -2.85233,-16.19667z" fill="#95a5a6"></path><path d="M97.89308,22.64308c-3.02792,-3.02792 -7.13083,-4.72642 -11.40933,-4.72642c-2.66958,0 -5.29975,0.66292 -7.65042,1.92783l-43,23.1555v72.89575c0,3.80192 1.50858,7.44617 4.19967,10.13367l6.55033,6.55392h78.83333v-17.91667l25.08333,-39.41667z" fill="#34495e"></path><path d="M35.83333,43h76.47908c3.80192,0 7.44617,1.50858 10.13367,4.19967l28.05392,28.05033v57.33333h-25.08333z" fill="#95a5a6"></path><path d="M125.41667,132.58333h-78.83333l21.5,21.5h57.33333z" fill="#000000"></path></g></g>
                </svg>
                <h1>Dart</h1>
            </div>           
            <div class="dropdown-category-btn" onclick="postCategoryQuery('Kotlin')">
                <svg class="dropdown-icon-2" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                width="50" height="50"
                viewBox="0 0 50 50"
                style=" fill:#000000;">
                    <path d="M46 46L6 46 26 26zM45 4L4 45.17 4 25.83 25.83 4zM23 4L4 23 4 4z"></path>
                </svg>
                <h1>Kotlin</h1>
            </div>                     
        </div>    

        <div class="new-navbar-button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM200 344V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H248v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
            <a href="create.php">Create</a>        
        </div>        

        <div class="new-navbar-button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
            <a href="profile.php">Profile</a>        
        </div>         

        <?php if(isset($_SESSION['ID_User'])){?>        

        <div class="new-navbar-button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96C43 32 0 75 0 128V384c0 53 43 96 96 96h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H96c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32h64zM504.5 273.4c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22v72H192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32H320v72c0 9.6 5.7 18.2 14.5 22s19 2 26-4.6l144-136z"/></svg>
            <a id="logout-mobile" href="#">Log Out</a>        
        </div>

        <?php }?>
    </div>
</div>
















<div class="side-navbar overflow-auto">
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
        <?php 
            if (isset($_SESSION['ID_User'])){
        ?>
            <img src="../src/user_pfp/<?= !$user_foto ? 'no-pfp.webp': htmlspecialchars($user_foto)?>"/>      
        <?php } else{?>
            <img src="../src/user_pfp/no-pfp.webp"/>          
        <?php }?>        


        <?php 
            if (isset($_SESSION['username'])){
        ?>
        <h1><?=htmlspecialchars($user_username)?></h1>        
        <?php } else{?>
            <h1>GUEST</h1>              
        <?php }?>
    </div>

    <!-- Ini nanti mau bisa di klik gk si semuanya (divnya) (bukan link nya aja)?--> 

    <?php if(isset($_SESSION['ADMIN'])){?>
        <div class="navbar-button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
            <a href="admin_panel.php">Panel</a>        
        </div>      
    <?php }?>


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
            <svg class="dropdown-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zM243.8 381.4c0 43.6-25.6 63.5-62.9 63.5-33.7 0-53.2-17.4-63.2-38.5l34.3-20.7c6.6 11.7 12.6 21.6 27.1 21.6 13.8 0 22.6-5.4 22.6-26.5V237.7h42.1v143.7zm99.6 63.5c-39.1 0-64.4-18.6-76.7-43l34.3-19.8c9 14.7 20.8 25.6 41.5 25.6 17.4 0 28.6-8.7 28.6-20.8 0-14.4-11.4-19.5-30.7-28l-10.5-4.5c-30.4-12.9-50.5-29.2-50.5-63.5 0-31.6 24.1-55.6 61.6-55.6 26.8 0 46 9.3 59.8 33.7L368 290c-7.2-12.9-15-18-27.1-18-12.3 0-20.1 7.8-20.1 18 0 12.6 7.8 17.7 25.9 25.6l10.5 4.5c35.8 15.3 55.9 31 55.9 66.2 0 37.8-29.8 58.6-69.7 58.6z"/>
            </svg>
            <h1>JavaScript</h1>
        </div>     
        <div class="dropdown-category-btn" onclick="postCategoryQuery('Python')">
            <svg class="dropdown-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path d="M439.8 200.5c-7.7-30.9-22.3-54.2-53.4-54.2h-40.1v47.4c0 36.8-31.2 67.8-66.8 67.8H172.7c-29.2 0-53.4 25-53.4 54.3v101.8c0 29 25.2 46 53.4 54.3 33.8 9.9 66.3 11.7 106.8 0 26.9-7.8 53.4-23.5 53.4-54.3v-40.7H226.2v-13.6h160.2c31.1 0 42.6-21.7 53.4-54.2 11.2-33.5 10.7-65.7 0-108.6zM286.2 404c11.1 0 20.1 9.1 20.1 20.3 0 11.3-9 20.4-20.1 20.4-11 0-20.1-9.2-20.1-20.4.1-11.3 9.1-20.3 20.1-20.3zM167.8 248.1h106.8c29.7 0 53.4-24.5 53.4-54.3V91.9c0-29-24.4-50.7-53.4-55.6-35.8-5.9-74.7-5.6-106.8.1-45.2 8-53.4 24.7-53.4 55.6v40.7h106.9v13.6h-147c-31.1 0-58.3 18.7-66.8 54.2-9.8 40.7-10.2 66.1 0 108.6 7.6 31.6 25.7 54.2 56.8 54.2H101v-48.8c0-35.3 30.5-66.4 66.8-66.4zm-6.7-142.6c-11.1 0-20.1-9.1-20.1-20.3.1-11.3 9-20.4 20.1-20.4 11 0 20.1 9.2 20.1 20.4s-9 20.3-20.1 20.3z"/>
            </svg>
            <h1>Python</h1>            
        </div>             
        <div class="dropdown-category-btn" onclick="postCategoryQuery('CPP')">
            <img class="cplusplus" src="../src/assets/cplusplus.png"/>
            <h1>C++</h1>
        </div>          
        <div class="dropdown-category-btn" onclick="postCategoryQuery('TypeScript')">
            <svg class="dropdown-icon-2" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                width="24" height="24"
                viewBox="0 0 172 172"
                style=" fill:#000000;">
                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                    <path d="M0,172v-172h172v172z" fill="none"></path>
                    <g fill="#000000">
                        <path d="M21.5,21.5v129h129v-129zM97.93967,89.23217h-15.179v46.9345h-12.2335v-46.9345h-14.86367v-10.39883h42.27617zM100.319,133.48633v-12.54883c0,0 6.85133,5.16717 15.07867,5.16717c8.22733,0 7.90483,-5.375 7.90483,-6.11317c0,-7.8045 -23.29883,-7.8045 -23.29883,-25.0905c0,-23.51383 33.9485,-14.233 33.9485,-14.233l-0.42283,11.17283c0,0 -5.69033,-3.79833 -12.126,-3.79833c-6.4285,0 -8.7505,3.06017 -8.7505,6.32817c0,8.43517 23.51383,7.5895 23.51383,24.56733c0,26.144 -35.84767,14.54833 -35.84767,14.54833z"></path>
                    </g>
                </g>
            </svg>
            <h1>TypeScript</h1>
        </div>                
        <div class="dropdown-category-btn" onclick="postCategoryQuery('PHP')">
            <svg class="dropdown-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path d="M320 104.5c171.4 0 303.2 72.2 303.2 151.5S491.3 407.5 320 407.5c-171.4 0-303.2-72.2-303.2-151.5S148.7 104.5 320 104.5m0-16.8C143.3 87.7 0 163 0 256s143.3 168.3 320 168.3S640 349 640 256 496.7 87.7 320 87.7zM218.2 242.5c-7.9 40.5-35.8 36.3-70.1 36.3l13.7-70.6c38 0 63.8-4.1 56.4 34.3zM97.4 350.3h36.7l8.7-44.8c41.1 0 66.6 3 90.2-19.1 26.1-24 32.9-66.7 14.3-88.1-9.7-11.2-25.3-16.7-46.5-16.7h-70.7L97.4 350.3zm185.7-213.6h36.5l-8.7 44.8c31.5 0 60.7-2.3 74.8 10.7 14.8 13.6 7.7 31-8.3 113.1h-37c15.4-79.4 18.3-86 12.7-92-5.4-5.8-17.7-4.6-47.4-4.6l-18.8 96.6h-36.5l32.7-168.6zM505 242.5c-8 41.1-36.7 36.3-70.1 36.3l13.7-70.6c38.2 0 63.8-4.1 56.4 34.3zM384.2 350.3H421l8.7-44.8c43.2 0 67.1 2.5 90.2-19.1 26.1-24 32.9-66.7 14.3-88.1-9.7-11.2-25.3-16.7-46.5-16.7H417l-32.8 168.7z"/>
            </svg>
            <h1>PHP</h1>
        </div>          
        <div class="dropdown-category-btn" onclick="postCategoryQuery('C')">
            <svg class="dropdown-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path d="M329.1 142.9c-62.5-62.5-155.8-62.5-218.3 0s-62.5 163.8 0 226.3s155.8 62.5 218.3 0c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3c-87.5 87.5-221.3 87.5-308.8 0s-87.5-229.3 0-316.8s221.3-87.5 308.8 0c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0z"/>
            </svg>
            <h1>C</h1>
        </div>        
        <div class="dropdown-category-btn" onclick="postCategoryQuery('Java')">
            <svg class="dropdown-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path d="M277.74 312.9c9.8-6.7 23.4-12.5 23.4-12.5s-38.7 7-77.2 10.2c-47.1 3.9-97.7 4.7-123.1 1.3-60.1-8 33-30.1 33-30.1s-36.1-2.4-80.6 19c-52.5 25.4 130 37 224.5 12.1zm-85.4-32.1c-19-42.7-83.1-80.2 0-145.8C296 53.2 242.84 0 242.84 0c21.5 84.5-75.6 110.1-110.7 162.6-23.9 35.9 11.7 74.4 60.2 118.2zm114.6-176.2c.1 0-175.2 43.8-91.5 140.2 24.7 28.4-6.5 54-6.5 54s62.7-32.4 33.9-72.9c-26.9-37.8-47.5-56.6 64.1-121.3zm-6.1 270.5a12.19 12.19 0 0 1-2 2.6c128.3-33.7 81.1-118.9 19.8-97.3a17.33 17.33 0 0 0-8.2 6.3 70.45 70.45 0 0 1 11-3c31-6.5 75.5 41.5-20.6 91.4zM348 437.4s14.5 11.9-15.9 21.2c-57.9 17.5-240.8 22.8-291.6.7-18.3-7.9 16-19 26.8-21.3 11.2-2.4 17.7-2 17.7-2-20.3-14.3-131.3 28.1-56.4 40.2C232.84 509.4 401 461.3 348 437.4zM124.44 396c-78.7 22 47.9 67.4 148.1 24.5a185.89 185.89 0 0 1-28.2-13.8c-44.7 8.5-65.4 9.1-106 4.5-33.5-3.8-13.9-15.2-13.9-15.2zm179.8 97.2c-78.7 14.8-175.8 13.1-233.3 3.6 0-.1 11.8 9.7 72.4 13.6 92.2 5.9 233.8-3.3 237.1-46.9 0 0-6.4 16.5-76.2 29.7zM260.64 353c-59.2 11.4-93.5 11.1-136.8 6.6-33.5-3.5-11.6-19.7-11.6-19.7-86.8 28.8 48.2 61.4 169.5 25.9a60.37 60.37 0 0 1-21.1-12.8z"/>
            </svg>
            <h1>Java</h1>
        </div>           
        <div class="dropdown-category-btn" onclick="postCategoryQuery('Ruby')">
            <svg class="dropdown-icon-2" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
            width="24" height="24"
            viewBox="0 0 50 50"
            style=" fill:#000000;">
                <path d="M 3.125 23.160156 L 8.183594 14.480469 C 8.230469 14.394531 8.292969 14.316406 8.363281 14.253906 L 17.441406 5.792969 C 17.539063 5.703125 17.65625 5.632813 17.78125 5.585938 L 25.578125 2.722656 L 32.152344 7.316406 L 28.878906 17.722656 L 16.597656 29.132813 L 6.582031 31.378906 Z M 7.296875 33.269531 L 11.96875 46.628906 L 15.8125 31.355469 Z M 42.484375 2.875 L 35.074219 6.992188 L 47.355469 15.910156 C 47.613281 14.761719 47.914063 13.195313 47.984375 11.863281 C 47.980469 11.847656 47.980469 11.828125 47.980469 11.808594 C 48.019531 9.910156 47.707031 7.925781 46.675781 6.210938 C 45.75 4.667969 44.359375 3.539063 42.535156 2.828125 C 42.519531 2.84375 42.507813 2.863281 42.484375 2.875 Z M 34.375 35.578125 L 29.296875 20.058594 L 18.988281 29.644531 Z M 31.144531 19.269531 L 36.1875 34.679688 C 40.132813 30.386719 44.171875 25.246094 46.476563 18.925781 Z M 45.382813 16.949219 L 33.851563 8.578125 L 31.117188 17.269531 Z M 5.761719 34.9375 L 2.335938 40.816406 C 3.507813 46.242188 7.566406 47.457031 10.242188 47.753906 Z M 4.878906 32.484375 L 2 25.644531 L 2 37.421875 Z M 39.921875 2.011719 C 39.90625 2.007813 39.890625 2 39.871094 2 L 28.039063 2 L 33.3125 5.6875 Z M 17.875 31.355469 L 13.777344 47.632813 C 22.109375 46.40625 28.359375 41.929688 33.425781 37.355469 Z M 44.546875 45.648438 C 44.3125 45.648438 44.074219 45.566406 43.882813 45.398438 L 35.617188 38.058594 C 31.984375 41.429688 27.742188 44.855469 22.519531 47.164063 L 44.5625 45.667969 C 44.691406 45.660156 44.8125 45.621094 44.925781 45.570313 C 44.804688 45.621094 44.675781 45.648438 44.546875 45.648438 Z M 37.0625 36.667969 L 45.210938 43.902344 C 45.382813 44.054688 45.472656 44.253906 45.511719 44.460938 L 47.195313 22.414063 C 44.582031 28.078125 40.742188 32.730469 37.0625 36.667969 Z"></path>
            </svg>
            <h1>Ruby</h1>
        </div>           
        <div class="dropdown-category-btn" onclick="postCategoryQuery('Dart')">
            <svg class="dropdown-icon-2" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
            width="48" height="48"
            viewBox="0 0 172 172"
            style=" fill:#000000;">
                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g><path d="M35.83333,43l10.75,89.58333l-28.73475,-28.73475c-4.26058,-4.26058 -5.40367,-10.73567 -2.85233,-16.19667z" fill="#95a5a6"></path><path d="M97.89308,22.64308c-3.02792,-3.02792 -7.13083,-4.72642 -11.40933,-4.72642c-2.66958,0 -5.29975,0.66292 -7.65042,1.92783l-43,23.1555v72.89575c0,3.80192 1.50858,7.44617 4.19967,10.13367l6.55033,6.55392h78.83333v-17.91667l25.08333,-39.41667z" fill="#34495e"></path><path d="M35.83333,43h76.47908c3.80192,0 7.44617,1.50858 10.13367,4.19967l28.05392,28.05033v57.33333h-25.08333z" fill="#95a5a6"></path><path d="M125.41667,132.58333h-78.83333l21.5,21.5h57.33333z" fill="#000000"></path></g></g>
            </svg>
            <h1>Dart</h1>
        </div>           
        <div class="dropdown-category-btn" onclick="postCategoryQuery('Kotlin')">
            <svg class="dropdown-icon-2" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
            width="50" height="50"
            viewBox="0 0 50 50"
            style=" fill:#000000;">
                <path d="M46 46L6 46 26 26zM45 4L4 45.17 4 25.83 25.83 4zM23 4L4 23 4 4z"></path>
            </svg>
            <h1>Kotlin</h1>
        </div>                     
    </div>


    <div class="navbar-button">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM200 344V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H248v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
        <a href="create.php">Create</a>        
    </div>        

    <div class="navbar-button">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
        <a href="profile.php">Profile</a>        
    </div>        


    <?php if(isset($_SESSION['ID_User'])){?>

        <div class="navbar-button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96C43 32 0 75 0 128V384c0 53 43 96 96 96h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H96c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32h64zM504.5 273.4c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22v72H192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32H320v72c0 9.6 5.7 18.2 14.5 22s19 2 26-4.6l144-136z"/></svg>
            <a id="logout-website" href="#">Log Out</a>        
        </div>        

    <?php }?>
</div>