<?php
require '../database/Connection.php';
require '../database/QueryBuilder.php';
require '../entity/Plantilla.php';
require '../entity/Usuario.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $type = $_POST['type'];
    $id = isset($_POST['id']) ? trim(htmlspecialchars($_POST['id'])): '';
//    echo $id;
    $config= require_once '../app/config.php';
    if ($type == 'solicitud'){

        try {
            //conexion con la bda
            $connection = Connection::make($config['database']);
            $queryBuilder = new QueryBuilder($connection,'plantillas', 'Plantilla');
            $plantilla = $queryBuilder->findById($id);
//            echo $plantilla;
            $json = array();
            $json[] = array(
                'id' => $plantilla->getId(),
                'nombre' => $plantilla->getNombre(),
                'contenido' => $plantilla->getContenido()

            );
            $jsonstring = json_encode($json);
            //echo 'success';
            echo $jsonstring;
        }catch(QueryBuilderException $queryBuilderException) {
            $errores=$queryBuilderException->getMessage();
            echo $errores;
        }

    }else{
        $id = trim(htmlspecialchars($_POST['id'])) ?: '';
        $nombre = trim(htmlspecialchars($_POST['nombre'])) ?: '';
        $contenido = trim(htmlspecialchars($_POST['contenido']))?: '';;


        try {
            //conexion con la bda
            $connection = Connection::make($config['database']);
            $queryBuilder = new QueryBuilder($connection,'plantillas', 'Plantilla');
            $plantilla = $queryBuilder->findById($id);

            $plantilla->setId($id);
            $plantilla->setNombre($nombre);
            $plantilla->setContenido($contenido);


            $queryBuilder->update($plantilla);
            echo 'success';


        }catch(QueryBuilderException $queryBuilderException) {
            $errores[]=$queryBuilderException->getMessage();
            echo $errores;
        }

    }






}

