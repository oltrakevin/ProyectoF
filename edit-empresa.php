<?php
session_start();
require 'database/Connection.php';
require 'database/QueryBuilder.php';
require 'entity/Empresa.php';
require 'entity/Usuario.php';
require 'entity/Ciclo.php';
require 'entity/EmpresaCiclo.php';


$cif=isset($_GET['cif'])? $_GET['cif']:0;

$user=isset($_SESSION['user']) ? unserialize($_SESSION['user']):NULL;
if ($user == NULL){
    header('Location:login.process.php');
    die();
}

$image = $user->getProfilePicture();

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

$config= require_once 'app/config.php';
$connection = Connection::make($config['database']);
$queryBuilder = new QueryBuilder($connection,'ciclo', 'Ciclo');
$ciclos = $queryBuilder->findAll();

$queryBuilder = new QueryBuilder($connection,'empresaciclo', 'EmpresaCiclo');
$empresaciclos = $queryBuilder->findAllByCif($cif);




include 'views/edit-empresa.view.php';


