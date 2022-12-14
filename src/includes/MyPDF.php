<?php namespace MyPDF;
    require('fpdf184/fpdf.php'); 
    use \FPDF as FPDF;

    class PDF extends FPDF\FPDF{

        
        public function createDocumentTitle($title){
            $this->setFont('Arial', 'B', 16);             
            $this->Cell(190, 10, $title,0, 1, 'C');
        }

        public function addDownloadTime(){
            $this->Cell(190, 10, 'Ditulis pada '.date('Y/m/d h:i:sa'),0, 1, 'C');            
        }

        public function createLine(){
            $this->Ln(4);             
            $this->Line(30, 30, $this->getPageWidth()-30, 30);            
        }

        public function createTagLineBreak($tag){
            $this->Cell(190, 10, $tag,0, 1, 'C');
        }

        public function createPostFragment($data, $pictures){

            $pictureList = explode(",", $data['gambar']);

            $this->SetFillColor(126, 156, 204);            
            $this->Cell(50, 10, "User Name", 1, 0,'L', 1);
            $this->SetFillColor(189, 209, 240);
            $this->Cell(140, 10, $data['username'],1, 1, 'L', 1);   
            
            $this->SetFillColor(126, 156, 204);                   
            $this->Cell(50, 10, "Nama Lengkap", 1, 0, 'L', 1);   
            $this->SetFillColor(189, 209, 240);                                 
            $this->Cell(140, 10,  $data['nama_lengkap'],1, 1, 'L', 1);    

            $this->SetFillColor(126, 156, 204);                   
            $this->Cell(50, 10, "Email", 1, 0, 'L', 1);            
            $this->SetFillColor(189, 209, 240);            
            $this->Cell(140, 10,  $data['email'],1, 1, 'L', 1);    

            $this->SetFillColor(126, 156, 204);                   
            $this->Cell(50, 10, "Waktu Post", 1, 0, 'L', 1);    
            $this->SetFillColor(189, 209, 240);                    
            $this->Cell(140, 10,  $data['waktu_post'],1, 1, 'L', 1);               

            $this->SetFillColor(126, 156, 204);                   
            $this->Cell(50, 10, "Kategori", 1, 0, 'L', 1);            
            $this->SetFillColor(189, 209, 240);            
            $this->Cell(140, 10,  $data['kategori'],1, 1, 'L', 1);              

            $this->SetFillColor(126, 156, 204);       
            $this->Cell(50, 10, "Jumlah Like", 1, 0, 'L', 1);            
            $this->SetFillColor(189, 209, 240);            
            $this->Cell(140, 10, $data['like'],1, 1, 'L', 1);

            $this->SetFillColor(126, 156, 204);                   
            $this->Cell(50, 10, "Jumlah Komen", 1, 0, 'L', 1);            
            $this->SetFillColor(189, 209, 240);            
            $this->Cell(140, 10,  $data['comments'],1, 1, 'L', 1);  



            $this->Cell(190, 10, "KONTEN POST" ,0, 1, 'L');                 
                if (isset($pictures)){
                    foreach($pictureList as $pict){
                        $this->Cell(0, 1, NULL,0, 1, 'L');                                
                        $this->Image("../user_post_pictures/".$pict, NULL, NULL, 80,64);          
                       
                    }    
                }
        
            
            $this->Cell(0, 5, NULL,0, 1, 'L');                    

            if (isset($pictures)) $this->Cell(190, 10, "CAPTION" ,0, 1, 'L');              
            $this->Cell(0, 5, NULL,0, 1, 'L');                     
            $this->MultiCell(190, 10, $data['isi'], 1, 'L');


            $this->Cell(0, 30, NULL,0, 1, 'L');                                                                
            
        }
        

    }

?>