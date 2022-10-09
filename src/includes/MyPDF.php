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

        

    }

?>