<?php
require '../database/Connection.php';
require '../database/QueryBuilder.php';
require '../entity/Empresa.php';
require '../entity/Usuario.php';
require '../entity/EmpresaCiclo.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cif = trim(htmlspecialchars($_POST['cif'])) ?: '';
    $nombre = trim(htmlspecialchars($_POST['nombre'])) ?: '';
    $localizacion = trim(htmlspecialchars($_POST['localizacion']));
    $localidad = trim(htmlspecialchars($_POST['localidad']));
    $cp = intval(trim($_POST['cp'])) ? : 0;
    $telefono1 = trim($_POST['telefono1']) ?: 0;
    $email = trim(htmlspecialchars($_POST['email']));
    $observaciones = trim(htmlspecialchars($_POST['observaciones']));
//    $fecha = trim(htmlspecialchars($_POST['fecha']));
    $fecha = \DateTime::createFromFormat('d-m-Y', $_POST['fecha']);
    $fecha = $fecha->format('Y-m-d');
    $ciclos = $_POST['ciclos'];

    try {
        //conexion con la bda
        $config= require_once '../app/config.php';
        $connection = Connection::make($config['database']);
        $queryBuilder = new QueryBuilder($connection,'empresas', 'Empresa');

        $empresa = new Empresa($cif,$nombre,$localizacion,$localidad,$cp,$telefono1,$email,$observaciones,$fecha);
        $queryBuilder->save($empresa);

        $queryBuilder = new QueryBuilder($connection,'empresaciclo', 'EmpresaCiclo');

//        echo 'success';
        foreach ($ciclos as $id){
            $ciclo=new EmpresaCiclo($cif,$id);
            $queryBuilder->save($ciclo);
        }


    }catch(QueryBuilderException $queryBuilderException) {
        $errores[]=$queryBuilderException->getMessage();
        echo $errores;
    }
}