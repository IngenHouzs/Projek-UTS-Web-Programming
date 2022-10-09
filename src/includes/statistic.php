<?php


    require('MyPDF.php');
    require_once('db.php');
    use \MyPDF as MyPDF;


    $pdf = new MyPDF\PDF();    


    $pdf = new MyPDF\PDF();
    $pdf->addPage();


    // GET DATA 


    $query = "SELECT User.username AS 'username', 
    User.nama_lengkap AS 'nama_lengkap', 
    User.email AS 'email',
    User.ID_User as 'user_id',
    Post.waktu_post as 'post_date', 
    Post.KATEGORI as 'kategori', 
    Post.Isi as 'isi', 
    Post.ID_Post as 'id',
    Post.waktu_post as 'waktu_post',
    User.foto as 'foto',
    (SELECT COUNT(ID_Post) FROM Like_Post 
    WHERE ID_Post = Like_Post.ID_Post AND Like_Post.ID_Post = Post.ID_Post) AS 'like',
    (SELECT nama_gambar FROM Gambar_Postingan WHERE Urutan = 1 AND Gambar_Postingan.ID_Post = Post.ID_Post) AS nama_gambar,
    (SELECT COUNT(ID_CommentPost) FROM Comment_Post WHERE Comment_Post.ID_CommentPost = ID_CommentPost AND Comment_Post.ID_Post = Post.ID_Post) AS 'comments'       ,

((SELECT COUNT(ID_Post) FROM Like_Post 
    WHERE ID_Post = Like_Post.ID_Post AND Like_Post.ID_Post = Post.ID_Post) * 0.3 + 
(SELECT COUNT(ID_CommentPost) FROM Comment_Post WHERE Comment_Post.ID_CommentPost = ID_CommentPost AND Comment_Post.ID_Post = Post.ID_Post) * 0.7) AS 'popularity', 
	
	(SELECT GROUP_CONCAT(gambar_postingan.nama_gambar) FROM gambar_postingan WHERE Post.ID_Post = gambar_postingan.ID_Post) AS 'gambar'

    FROM Post, User WHERE Post.ID_User = User.ID_User
    ORDER BY Post.KATEGORI ASC, 'popularity' DESC"; 


    date_default_timezone_set('Antarctica/Davis');

    $exec = $db->query($query);

    $currentTag = '';
    $index = 0;
    // PDF Assignment

    $pdf->createDocumentTitle('STATISTIK UNGGAHAN PENGGUNA PROLANGRAM');
    $pdf->setFont('Arial', '', 16); 
    $pdf->addDownloadTime();
    $pdf->createLine();


    while ($result = $exec->fetch(PDO::FETCH_ASSOC)){
        if ($index > 0) $pdf->addPage();     
        if ($currentTag != $result['kategori']){ 
            $currentTag = $result['kategori'];            
            $pdf->createTagLineBreak($currentTag);   
            $index++;                  
        }   
        $pdf->createPostFragment($result, $result['gambar']);
    
    }
    



    $pdf->Output();        


    
?>




<?php 
    // header('location: ../../app/admin_panel.php');
    // die();
?>