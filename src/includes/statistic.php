<?php


    require('MyPDF.php');
    require_once('db.php');
    use \MyPDF as MyPDF;


    $pdf = new MyPDF\PDF();    


    $pdf = new MyPDF\PDF();
    $pdf->addPage();


    // GET DATA 


    $query = "SELECT user.username AS 'username', 
    user.nama_lengkap AS 'nama_lengkap', 
    user.email AS 'email',
    user.id_user as 'user_id',
    post.waktu_post as 'post_date', 
    post.kategori as 'kategori', 
    post.isi as 'isi', 
    post.id_post as 'id',
    post.waktu_post as 'waktu_post',
    user.foto as 'foto',
    (SELECT COUNT(id_post) FROM like_post 
    WHERE id_post = like_post.id_post AND like_post.id_post = post.id_post) AS 'like',
    (SELECT nama_gambar FROM gambar_postingan WHERE urutan = 1 AND gambar_postingan.id_post = post.id_post) AS nama_gambar,
    (SELECT COUNT(id_commentpost) FROM comment_post WHERE comment_post.id_commentpost = id_commentpost AND comment_post.id_post = post.id_post) AS 'comments'       ,

((SELECT COUNT(id_post) FROM like_post 
    WHERE id_post = like_post.id_post AND like_post.id_post = post.id_post) * 0.3 + 
(SELECT COUNT(id_commentpost) FROM comment_post WHERE comment_post.id_commentpost = id_commentpost AND comment_post.id_post = post.id_post) * 0.7) AS 'popularity', 
	
	(SELECT GROUP_CONCAT(gambar_postingan.nama_gambar) FROM gambar_postingan WHERE post.id_post = gambar_postingan.id_post) AS 'gambar'

    FROM post, user WHERE post.id_user = user.id_user
    ORDER BY post.kategori ASC, 'popularity' DESC"; 


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
    



    $pdf->Output('D', 'Laporan Statistik Prolangram.pdf');        


    
?>




<?php 
    // header('location: ../../app/admin_panel.php');
    // die();
?>