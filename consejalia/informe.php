<?php
include "conexion.php";
require('fpdf/fpdf.php');


class PDF extends FPDF
{
// Cabecera de pÃ¡gina
function Header()
{
    // Logo
    $this->Image('img/banner.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(60);
    // TÃ­tulo
    $this->Cell(80,10,'Informe de Transacciones',1,0,'C');
    // Salto de lÃ­nea
    $this->Ln(20);
}

// Pie de pÃ¡gina
function Footer()
{
    // PosiciÃ³n: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // NÃºmero de pÃ¡gina
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// CreaciÃ³n del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Times','b',14);
$pdf->Cell(0,10,"Ingresado:",0,1);
$pdf->SetFont('Times','b',11);
$filas= mysqli_query($conexion, "SELECT * FROM expediente");

            $pdf->Cell(50,6,"Titulo",1);
            $pdf->Cell(30,6, "Numero",1);
            $pdf->Cell(40,6, "Ente",1);
            $pdf->Cell(40,6, "Area",1);
            $pdf->Cell(30,6, "Fecha",1,1);

$pdf->SetFont('Times','',11);
while ($fila=mysqli_fetch_array($filas)) { 
    if($fila["estado"]=="Ingresado"){
            $pdf->Cell(50,6,$fila["titulo"],1);
            $pdf->Cell(30,6, $fila["numero"],1);
            $pdf->Cell(40,6,$fila["ente"],1);
            $pdf->Cell(40,6,$fila["area"],1);
            $pdf->Cell(30,6,$fila["fecha"],1,1);
        }              
}

$pdf->SetFont('Times','b',14);
$pdf->Cell(0,10,"En Tratamiento:",0,1);
$pdf->SetFont('Times','b',11);
$filas= mysqli_query($conexion, "SELECT * FROM expediente");

            $pdf->Cell(50,6,"Titulo",1);
            $pdf->Cell(30,6, "Numero",1);
            $pdf->Cell(40,6, "Ente",1);
            $pdf->Cell(40,6, "Area",1);
            $pdf->Cell(30,6, "Fecha",1,1);
            
$pdf->SetFont('Times','',11);
while ($fila=mysqli_fetch_array($filas)) { 
    if($fila["estado"]=="En tratamiento"){
            $pdf->Cell(50,6,$fila["titulo"],1);
            $pdf->Cell(30,6, $fila["numero"],1);
            $pdf->Cell(40,6,$fila["ente"],1);
            $pdf->Cell(40,6,$fila["area"],1);
            $pdf->Cell(30,6,$fila["fecha"],1,1);
        }              
}

$pdf->SetFont('Times','b',14);
$pdf->Cell(0,10,"Para firma:",0,1);
$pdf->SetFont('Times','b',11);
$filas= mysqli_query($conexion, "SELECT * FROM expediente");

            $pdf->Cell(50,6,"Titulo",1);
            $pdf->Cell(30,6, "Numero",1);
            $pdf->Cell(40,6, "Ente",1);
            $pdf->Cell(40,6, "Area",1);
            $pdf->Cell(30,6, "Fecha",1,1);
            
$pdf->SetFont('Times','',11);
while ($fila=mysqli_fetch_array($filas)) { 
    if($fila["estado"]=="Para firma"){
            $pdf->Cell(50,6,$fila["titulo"],1);
            $pdf->Cell(30,6, $fila["numero"],1);
            $pdf->Cell(40,6,$fila["ente"],1);
            $pdf->Cell(40,6,$fila["area"],1);
            $pdf->Cell(30,6,$fila["fecha"],1,1);
        }              
}

$pdf->SetFont('Times','b',14);
$pdf->Cell(0,10,"Resuelto:",0,1);
$pdf->SetFont('Times','b',11);
$filas= mysqli_query($conexion, "SELECT * FROM expediente");

            $pdf->Cell(50,6,"Titulo",1);
            $pdf->Cell(30,6, "Numero",1);
            $pdf->Cell(40,6, "Ente",1);
            $pdf->Cell(40,6, "Area",1);
            $pdf->Cell(30,6, "Fecha",1,1);
            
$pdf->SetFont('Times','',11);
while ($fila=mysqli_fetch_array($filas)) { 
    if($fila["estado"]=="Resuelto"){
            $pdf->Cell(50,6,$fila["titulo"],1);
            $pdf->Cell(30,6, $fila["numero"],1);
            $pdf->Cell(40,6,$fila["ente"],1);
            $pdf->Cell(40,6,$fila["area"],1);
            $pdf->Cell(30,6,$fila["fecha"],1,1);
        }              
}   

$pdf->SetFont('Times','b',14);
$pdf->Cell(0,10,"Archivado:",0,1);
$pdf->SetFont('Times','b',11);
$filas= mysqli_query($conexion, "SELECT * FROM expediente");

            $pdf->Cell(50,6,"Titulo",1);
            $pdf->Cell(30,6, "Numero",1);
            $pdf->Cell(40,6, "Ente",1);
            $pdf->Cell(40,6, "Area",1);
            $pdf->Cell(30,6, "Fecha",1,1);
            
$pdf->SetFont('Times','',11);
while ($fila=mysqli_fetch_array($filas)) { 
    if($fila["estado"]=="Archivado"){
            $pdf->Cell(50,6,$fila["titulo"],1);
            $pdf->Cell(30,6, $fila["numero"],1);
            $pdf->Cell(40,6,$fila["ente"],1);
            $pdf->Cell(40,6,$fila["area"],1);
            $pdf->Cell(30,6,$fila["fecha"],1,1);
        }              
} 

$pdf->Output();
?>