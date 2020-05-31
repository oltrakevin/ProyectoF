<?php
require 'database/Connection.php';
require 'database/QueryBuilder.php';
require 'entity/Empresa.php';
require 'entity/Ciclo.php';
require "fpdf/fpdf.php";

$search=$_GET['search'];

$contactos=[];
try {
    //conexion con la bda
    $config = require_once 'app/config.php';
    $connection = Connection::make($config['database']);
    $queryBuilder = new QueryBuilder($connection,'empresas', 'Empresa');
    $empresas = $queryBuilder->findSearch($search);

}catch(QueryBuilderException $queryBuilderException) {
    $errores[]=$queryBuilderException->getMessage();
}
function getCiclos($ciclos){
    $result='';
    foreach ($ciclos as $ciclo){
        $result.=$ciclo->getCiclo().', ';
    }
    return $result;
}
//$fpdf->SetFillColor(201, 203, 255);//define el fondo de las filas
//$fpdf->SetTextColor(0,0,0);//define color de texto


$fpdf = new FPDF();
//Pagina
$fpdf ->AddPage('LANDSCAPE','A4');
$fpdf ->SetFont('Arial','B',15);
$fpdf->Write(0,'Empresas','http://localhost/ProyectoF/empresas.php');
$fpdf->Ln(10);
$fpdf->SetFontSize(10);

$fpdf->Cell(15,6, 'cif',0,0,'C',false);
$fpdf->Cell(55,6, 'Nombre',0,0,'C',false);
$fpdf->Cell(60,6, 'Localizacion',0,0,'C',false);
//$fpdf->Cell(15,6, 'Localidad',0,0,'C',false);
$fpdf->Cell(10,6, 'CP',0,0,'C',false);
$fpdf->Cell(20,6, 'Telefono1',0,0,'C',false);
$fpdf->Cell(35,6, 'Email',0,0,'C',false);
$fpdf->Cell(55,6, 'Observaciones',0,0,'C',false);
//$fpdf->Cell(15,6, 'Fecha',0,0,'C',false);
$fpdf->Cell(33,6, 'Ciclo',0,0,'C',false);

$fpdf->SetDrawColor(66, 123, 245);
$fpdf->SetLineWidth(1);
$fpdf->Line(10,48,292,48);
$fpdf->SetTextColor(0,0,0);
$fpdf->Ln(10);
$fpdf->SetFont('Arial','',9);

$fpdf->SetLineWidth(0.2);
$fpdf->SetDrawColor(0,0,0);


foreach ($empresas as $empresa) {
    $ciclos = $queryBuilder->injectSQLObject("SELECT ci.id,ci.ciclo FROM ciclo ci INNER JOIN empresaciclo e USING (id) WHERE e.cif='".$empresa->getCif()."'",'Ciclo');

    $fpdf->Cell(15,10, $empresa->getCif(),'B',0,'C',false);
    $fpdf->Cell(55,10, $empresa->getNombre(),'B',0,'C',false);
    $fpdf->Cell(60,10, $empresa->getLocalizacion(),'B',0,'C',false);
//    $fpdf->Cell(15,10, $empresa->getLocalidad(),'B',0,'C',false);
    $fpdf->Cell(10,10, $empresa->getCp(),'B',0,'C',false);
    $fpdf->Cell(20,10, $empresa->getTelefono1(),'B',0,'C',false);
    $fpdf->Cell(35,10, $empresa->getEmail(),'B',0,'C',false);
    $fpdf->Cell(55,10, $empresa->getObservaciones(),'B',0,'C',false);
//    $fpdf->Cell(15,10, $empresa->getFecha(),'B',0,'C',false);
    $fpdf->Cell(33,10, getCiclos($ciclos),'B',0,'C',false);

    $fpdf->Ln();
}

//$fpdf ->AddPage('LANDSCAPE','A4');

$fpdf ->Output('I','empresas.pdf', true);
exit;
