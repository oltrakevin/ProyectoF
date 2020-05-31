<?php
session_start();
require '../database/Connection.php';
require '../database/QueryBuilder.php';
require '../entity/Empresa.php';

$user=isset($_SESSION['user']) ? unserialize($_SESSION['user']):NULL;

if ($_SERVER['REQUEST_METHOD']=== 'POST') {
    $cif=$_POST['cif'];
}

if ($user == NULL){
    //   header('Location:login.process.php');
    // die();
    echo 'error';
}else{

    $errores=[];
    try {
        //conexion con la bda
        $config= require_once '../app/config.php';
        $connection = Connection::make($config['database']);
        $queryBuilder = new QueryBuilder($connection,'empresas', 'Empresa');

        if (!isset($cif)) echo 'error';
        else{
            $empresa = $queryBuilder->findByCif($cif);

            $queryBuilder->deleteEmpresa($empresa);
            echo 'success';
        }

    }catch(QueryBuilderException $queryBuilderException) {
        $errores[]=$queryBuilderException->getMessage();
    }
}


