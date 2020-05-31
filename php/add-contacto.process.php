<?php
require '../database/Connection.php';
require '../database/QueryBuilder.php';
require '../entity/Contacto.php';
require '../entity/Usuario.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = trim(htmlspecialchars($_POST['id'])) ?: '';
    $nombre = trim(htmlspecialchars($_POST['nombre'])) ?: '';
    $contacto = trim(htmlspecialchars($_POST['contacto']));
    $localizacion = trim(htmlspecialchars($_POST['localizacion']));
    $localidad = trim(htmlspecialchars($_POST['localidad']));
    $cp = intval(trim($_POST['cp'])) ? : 0;
    $telefono1 = trim($_POST['telefono1']) ?: 0;
    $telefono2 = trim($_POST['telefono2']) ?: 0;
    $email = trim(htmlspecialchars($_POST['email']));
    $observaciones = trim(htmlspecialchars($_POST['observaciones']));
    //$fecha = trim(htmlspecialchars($_POST['fecha']));//date('Y-m-d');trim(htmlspecialchars($_POST['fecha']));
//    $fechaa = explode('-',trim(htmlspecialchars($_POST['fecha'])));
//    $fecha = date('Y-m-d', mktime(0,0,0,intval($fechaa[1]),intval($fechaa[0]),intval($fechaa[0]))); //$fecha[2].'-'.$fecha[1].'-'.$fecha[0];
    $fecha = \DateTime::createFromFormat('d-m-Y', $_POST['fecha']);
    $fecha = $fecha->format('Y-m-d');

    try {
        //conexion con la bda
        $config= require_once '../app/config.php';
        $connection = Connection::make($config['database']);
        $queryBuilder = new QueryBuilder($connection,'contactos', 'Contacto');

        $contacto = new Contacto($nombre,$contacto,$localizacion,$localidad,$cp,$telefono1,$telefono2,$email,$observaciones,$fecha);
        $queryBuilder->save($contacto);

        echo 'success';
        echo $_POST['fecha'];


    }catch(QueryBuilderException $queryBuilderException) {
        $errores[]=$queryBuilderException->getMessage();
        echo $errores;
    }
}