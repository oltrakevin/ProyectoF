<?php
session_start();
require 'database/Connection.php';
require 'database/QueryBuilder.php';
require 'entity/Empresa.php';
require 'entity/Contacto.php';
require 'entity/Usuario.php';


$id=isset($_GET['id'])? $_GET['id']:0;

$user=isset($_SESSION['user']) ? unserialize($_SESSION['user']):NULL;
if ($user == NULL){
    header('Location:login.process.php');
    die();
}

$image = $user->getProfilePicture();

$config= require_once 'app/config.php';
$connection = Connection::make($config['database']);

$queryBuilder = new QueryBuilder($connection,'empresas', 'Empresa');
$empresas = $queryBuilder->findAll();

$queryBuilder = new QueryBuilder($connection,'contactos', 'Contacto');
$contacto = $queryBuilder->findById($id);

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



include 'views/edit-contacto.view.php';


