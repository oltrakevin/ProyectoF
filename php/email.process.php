<?php
require '../database/Connection.php';
require '../database/QueryBuilder.php';
require '../entity/Plantilla.php';

try {
    //conexion con la bda
    $config = require_once '../app/config.php';
    $connection = Connection::make($config['database']);
    $queryBuilder = new QueryBuilder($connection,'plantillas', 'Plantilla');
    $plantillas = $queryBuilder->findAll();

    $json = array();
    foreach ($plantillas as $plantilla){
        $json[] = array(
            'id' => $plantilla->getId(),
            'nombre' => $plantilla->getNombre(),
            'contenido' => $plantilla->getContenido()
        );
    }
//    echo $json;

    $jsonstring = json_encode($json);
    echo $jsonstring;

}catch(QueryBuilderException $queryBuilderException) {
    $errores[]=$queryBuilderException->getMessage();
}

