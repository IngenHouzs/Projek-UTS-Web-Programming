<?php

    session_start();
    require('db.php');

    // IMAGE POSTS PROCESSING

    $uploadedFiles = $_FILES["foto"]["name"];
    $tmp_file = $_FILES["foto"]["tmp_name"];

    $fileAmount = count($uploadedFiles); 

    
    $encryptedImageNames = [];

    $ERR = FALSE;

    $index = 0;
    if ($fileAmount){
        for ($index; $index < $fileAmount; $index++){
            $file_ext = explode('.', $uploadedFiles[$index]);
            $file_ext = end($file_ext);
            $file_ext = strtolower($file_ext);        
    
            $newUniqueFileName = uniqid("G-", true);
            $newUniqueFileName .= ".$file_ext";
    
            if ($file_ext == 'jpg' || $file_ext == 'png' || $file_ext == 'jpeg' || $file_ext == 'svg' || $file_ext == 'webp' || $file_ext == 'bmp' || $file_ext == 'gif'){        
                array_push($encryptedImageNames, $newUniqueFileName);
            } else { 
                    $ERR = TRUE;
                    if (count($encryptedImageNames) > 0){
                        header('location: ../../app/create.php?err=1');            
                        die();
                    }

          
            }
        }
    } 





    // OTHER DETAILS PROCESSING
    $tag = $_POST['tag'];
    $caption = $_POST['caption'];

    // BUAT ROW BARU DI TABLE POST

    $post_id = uniqid('P-', true);      
    if (
        isset($_SESSION['id_user']) &&
        isset($_SESSION['nama_lengkap']) &&
        isset($_SESSION['username']) &&
        isset($_SESSION['email'])                        
    )  {
        
        if ($ERR && $_FILES['foto']['name'][0] != '') {
            header('location: ../../app/create.php?err=1');                    
            die();
        }

        $user_id = $_SESSION['id_user'];
        date_default_timezone_set('Antarctica/Davis');        
        $date = date('Y-m-d H:i:s');        
        $createPostQuery = "INSERT INTO post VALUES (?, ?, ?, ?, ?)";

        $data = [$post_id, $user_id, $date, $tag, $caption];
        $queryExecution = $db->prepare($createPostQuery);
        try{
            $queryExecution->execute($data); 
            if ($_FILES['foto']['name'][0] == ''){
                header('location: ../../app/create.php?err=none');                    
                die();                
            }
        } catch(Exception $e){
            header('location: ../../app/create.php?err=5');            
            die();
        }
    } else {
        header('location: ../../app/register.php');            
        die();        
    }

    // BUAT ROW BARU DI TABEL GAMBAR_POSTINGAN

    $statements = [];


    if ($fileAmount > 0 && !$ERR){
        $insertPostImagesQuery = "INSERT INTO gambar_postingan VALUES";
        for ($index = 0; $index < $fileAmount;$index++){

            move_uploaded_file($tmp_file[$index], "../user_post_pictures/".$encryptedImageNames[$index]); 

            if ($index != $fileAmount-1) $insertPostImagesQuery .= "(?, ?, ?),";
            else $insertPostImagesQuery .= "(?, ?, ?);";
            array_push($statements, 
                $post_id, $encryptedImageNames[$index], $index+1
            );
        } 
        
        $imageQueryExecution = $db->prepare($insertPostImagesQuery);
        try{
            $imageQueryExecution->execute($statements); 
            header('location: ../../app/create.php?err=none');                            
        } catch(Exception $e){
            header('location: ../../app/create.php?err=none');            
            die();            
        }

    }



?>      