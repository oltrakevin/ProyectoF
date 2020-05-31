<?php
session_start();
require '../database/Connection.php';
require '../database/QueryBuilder.php';
require '../entity/Contacto.php';

$user=isset($_SESSION['user']) ? unserialize($_SESSION['user']):NULL;

if ($_SERVER['REQUEST_METHOD']=== 'POST') {
    $id=$_POST['id'];
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
        $queryBuilder = new QueryBuilder($connection,'contactos', 'Contacto');

        if (!isset($id)) echo 'error';
        else{
            $contacto = $queryBuilder->findById($id);

            $queryBuilder->delete($contacto);
            echo 'success';
        }

    }catch(QueryBuilderException $queryBuilderException) {
        $errores[]=$queryBuilderException->getMessage();
    }
}


