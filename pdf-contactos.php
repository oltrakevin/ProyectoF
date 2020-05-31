<?php
require 'database/Connection.php';
require 'database/QueryBuilder.php';
require 'entity/Contacto.php';
require "fpdf/fpdf.php";

$search=$_GET['search'];

$contactos=[];
try {
    //conexion con la bda
    $config = require_once 'app/config.php';
    $connection = Connection::make($config['database']);
    $queryBuilder = new QueryBuilder($connection,'Contactos', 'Contacto');
    $contactos = $queryBuilder->findSearch($search);

}catch(QueryBuilderException $queryBuilderException) {
    $errores[]=$queryBuilderException->getMessage();
}



$fpdf = new FPDF();
//Pagina
$fpdf ->AddPage('LANDSCAPE','A4');
$fpdf ->SetFont('Arial','B',15);

$fpdf->Write(0,'Contactos','http://localhost/ProyectoFinal/contactos.php');
$fpdf->Ln(10);

$fpdf->SetFontSize(10);

//$fpdf->SetFillColor(201, 203, 255);//define el fondo de las filas
//$fpdf->SetTextColor(0,0,0);//define color de texto

$fpdf->Cell(6,6, 'id',0,0,'C',false);
$fpdf->Cell(55,6, 'Nombre',0,0,'C',false);
$fpdf->Cell(20,6, 'Contacto',0,0,'C',false);
$fpdf->Cell(70,6, 'Localizacion',0,0,'C',false);
$fpdf->Cell(20,6, 'Telefono1',0,0,'C',false);
//$fpdf->Cell(20,6, 'Telefono2',0,0,'C',false);
$fpdf->Cell(50,6, 'Email',0,0,'C',false);
//$fpdf->Cell(11,6, 'Fecha',0,0,'C',false);
$fpdf->Cell(55,6, 'Observaciones',0,0,'C',false);

$fpdf->SetDrawColor(66, 123, 245);
$fpdf->SetLineWidth(1);
$fpdf->Line(10,48,292,48);
$fpdf->SetTextColor(0,0,0);
$fpdf->Ln(10);
$fpdf->SetFont('Arial','',9);

$fpdf->SetLineWidth(0.2);
$fpdf->SetDrawColor(0,0,0);




foreach ($contactos as $contacto) {
    $fpdf->Cell(6,10, $contacto->getId(),'B',0,'C',false);
    $fpdf->Cell(55,10, $contacto->getNombre(),'B',0,'C',false);
    $fpdf->Cell(20,10, $contacto->getContacto(),'B',0,'C',false);
    $fpdf->Cell(70,10, $contacto->getLocalizacion(),'B',0,'C',false);
    $fpdf->Cell(20,10, $contacto->getTelefono1(),'B',0,'C',false);
//    $fpdf->Cell(20,10, $contacto->getTelefono2(),'B',0,'C',false);
    $fpdf->Cell(50,10, $contacto->getEmail(),'B',0,'C',false);
//    $fpdf->Cell(11,10, $contacto->getFecha(),'B',0,'C',false);
    $fpdf->Cell(55,10, $contacto->getObservaciones(),'B',0,'C',false);
    $fpdf->Ln();
}

//$fpdf ->AddPage('LANDSCAPE','A4');

$fpdf ->Output('I','contactos.pdf', true);
exit;
