<?php
require '../database/Connection.php';
require '../database/QueryBuilder.php';
require '../entity/Contacto.php';
require '../entity/Plantilla.php';

try {
    //conexion con la bda
    $config = require_once '../app/config.php';
    $connection = Connection::make($config['database']);

    $queryBuilder = new QueryBuilder($connection,'plantillas', 'Plantilla');
    $plantillas = $queryBuilder->findAll();

//    $arrayEmpresas = [];
//    foreach ($plantillas as $plantilla){
//        $arrayEmpresas[$empresa->getCif()] = $empresa->toArray();
//    }

    $search = $_POST['search'];

//    if (!empty($search)){

    $busqueda = $queryBuilder->findSearch($search);

    $json = array();

    foreach ($busqueda as $plantilla){

        $json[] = array(
            'id' => $plantilla->getId(),
            'nombre' => $plantilla->getNombre(),
            'contenido' => $plantilla->getContenido(),


        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;


}catch(QueryBuilderException $queryBuilderException) {
    $errores[]=$queryBuilderException->getMessage();
}

