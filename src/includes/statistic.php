<?php


    require('MyPDF.php');
    use \MyPDF as MyPDF;


    $pdf = new MyPDF\PDF();    


    $pdf = new MyPDF\PDF();
    $pdf->addPage();
    $pdf->setFont('Arial', '', 16);


    
    $pdf->createTableTitle('Data Mahasiswa');
    $pdf->createTableHeader(array('No.', 'NIM', 'Nama', 'Prodi'));
    $pdf->insertContentToTable($mahasiswa);
    $pdf->Output();    

    



?>




<?php 
    // header('location: ../../app/admin_panel.php');
    // die();
?>