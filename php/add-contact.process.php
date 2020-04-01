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
    $telefono1 = trim($_POST['telefono1']) ?: 0;
    $telefono2 = trim($_POST['telefono2']) ?: 0;
    $email = trim(htmlspecialchars($_POST['email']));
    $observaciones = trim(htmlspecialchars($_POST['observaciones']));
    $fecha = date('Y-m-d');//trim(htmlspecialchars($_POST['fecha']));

    try {
        //conexion con la bda
        $config= require_once '../app/config.php';
        $connection = Connection::make($config['database']);
        $queryBuilder = new QueryBuilder($connection,'contactos', 'Contacto');

        $contacto = new Contacto($nombre,$contacto,$localizacion,$telefono1,$telefono2,$email,$observaciones,$fecha);
        $queryBuilder->save($contacto);

        echo 'success';


    }catch(QueryBuilderException $queryBuilderException) {
        $errores[]=$queryBuilderException->getMessage();
        echo $errores;
    }
}