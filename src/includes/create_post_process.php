<?php

    session_start();
    require('db.php');

    // IMAGE POSTS PROCESSING
    $uploadedFiles = $_FILES["foto"]["name"];
    $tmp_file = $_FILES["foto"]["tmp_name"];

    $fileAmount = count($uploadedFiles);
    
    $encryptedImageNames = [];
    for ($index = 0; $index < $fileAmount; $index++){
        $file_ext = explode('.', $uploadedFiles[$index]);
        $file_ext = end($file_ext);
        $file_ext = strtolower($file_ext);        

        $newUniqueFileName = uniqid("G-", true);
        $newUniqueFileName .= ".$file_ext";

        if ($file_ext == 'jpg' || $file_ext == 'png' || $file_ext == 'jpeg' || $file_ext == 'svg' || $file_ext == 'webp' || $file_ext == 'bmp' || $file_ext == 'gif'){        
            move_uploaded_file($tmp_file[$index], "../user_post_pictures/$newUniqueFileName"); 
            array_push($encryptedImageNames, $newUniqueFileName);
        }
    }


    // OTHER DETAILS PROCESSING
    $tag = $_POST['tag'];
    $caption = $_POST['caption'];

    // BUAT ROW BARU DI TABLE POST

    
    if (
        isset($_SESSION['ID_User']) &&
        isset($_SESSION['nama_lengkap']) &&
        isset($_SESSION['username']) &&
        isset($_SESSION['email'])                        
    )  {
        $post_id = uniqid('P-', true);        
        $user_id = $_SESSION['ID_User'];
        $date = date('Y-m-d H:i:s');        
        $createPostQuery = "INSERT INTO Post VALUES (?, ?, ?, ?, ?)";

        $data = [$post_id, $user_id, $date, $tag, $caption];
        $queryExecution = $db->prepare($createPostQuery);
        try{
            $queryExecution->execute($data);
        } catch(Exception $e){
            header('location: ../../app/create.php?err=1');            
            die();
        }
    } else {
        header('location: ../../app/register.php');            
        die();        
    }

    // BUAT ROW BARU DI TABEL GAMBAR_POSTINGAN
    









?>      