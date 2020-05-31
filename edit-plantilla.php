<?php
session_start();
require 'database/Connection.php';
require 'database/QueryBuilder.php';
require 'entity/Plantilla.php';
require 'entity/Usuario.php';


$id=isset($_GET['id'])? $_GET['id']:0;

$user=isset($_SESSION['user']) ? unserialize($_SESSION['user']):NULL;
if ($user == NULL){
    header('Location:login.process.php');
    die();
}

$image = $user->getProfilePicture();

//$config= require_once 'app/config.php';
//$connection = Connection::make($config['database']);
//
//$queryBuilder = new QueryBuilder($connection,'plantillas', 'Plantilla');
//$plantilla = $queryBuilder->findById($id);

//    $errores=[];
//    try {
//        //conexion con la bda
//        $config= require_once 'app/config.php';
//        $connection = Connection::make($config['database']);
//        $queryBuilder = new QueryBuilder($connection,'contactos', 'Contacto');
//
//        if (!isset($id)) echo 'error';
//        else{
//            $contacto = $queryBuilder->findById($id);
//
//           // $queryBuilder->delete($contacto);
//            //echo 'success';
//        }
//
//    }catch(QueryBuilderException $queryBuilderException) {
//        $errores[]=$queryBuilderException->getMessage();
//    }
//}



include 'views/edit-plantilla.view.php';


