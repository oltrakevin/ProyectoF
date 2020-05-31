<?php
require '../database/Connection.php';
require '../database/QueryBuilder.php';
require '../entity/Plantilla.php';
require '../entity/Usuario.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

//    $id = trim(htmlspecialchars($_POST['id'])) ?: '';
    $nombre = trim(htmlspecialchars($_POST['nombre'])) ?: '';
    $contenido = trim(htmlspecialchars($_POST['contenido']))?: '';


    try {
        //conexion con la bda
        $config= require_once '../app/config.php';
        $connection = Connection::make($config['database']);
        $queryBuilder = new QueryBuilder($connection,'plantillas', 'Plantilla');

        $plantilla = new Plantilla($nombre,$contenido);
        $queryBuilder->save($plantilla);

        echo 'success';

    }catch(QueryBuilderException $queryBuilderException) {
        $errores[]=$queryBuilderException->getMessage();
        echo $errores;
    }
}