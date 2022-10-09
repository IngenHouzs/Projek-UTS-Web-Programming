<?php namespace MyPDF;
    require('fpdf184/fpdf.php'); 
    use \FPDF as FPDF;

    class PDF extends FPDF\FPDF{

        
        public function createTableTitle($title){
            $this->Cell(190, 10, $title, 1,1, 'C');  // 1 pertama buat frame or no
        }                                            // 1 kedua buat next line next/no   

        public function createTableHeader($params){ 
            $index = TRUE;
            foreach($params as $p){
                if ($index){
                    $this->Cell(30, 10, $p, 1, 0, 'L');
                    $index = FALSE;
                    continue;
                }
                if ($p == 'Prodi') $this->Cell(53.3, 10, $p, 1, 1, 'L');                
                else $this->Cell(53.3, 10, $p, 1, 0, 'L');                
            }
        }


        public function insertContentToTable($data){
            $index = TRUE;
            $cellWidth = 30;
            $numbering = 0;
            foreach($data as $d){
                $numbering++;   
                $this->Cell(30, 10, $numbering, 1, 0, 'L');    
                $this->Cell(53.3, 10, $d["NIM"], 1, 0, 'L');                
                $this->Cell(53.3, 10, $d["Nama"], 1, 0, 'L');   
                $this->Cell(53.3, 10, $d["Prodi"], 1, 1, 'L');                 
            }                         
        }
        

    }

?>