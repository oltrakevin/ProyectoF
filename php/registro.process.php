<?php
session_start();
require '../database/Connection.php';
require '../database/QueryBuilder.php';
require '../entity/Usuario.php';
require '../utils/funciones.php';

$nombre=trim(htmlspecialchars($_POST['nombre']));
$apellidos=trim(htmlspecialchars($_POST['apellidos']));
$user=trim(htmlspecialchars($_POST['email']));
$password1=trim(htmlspecialchars($_POST['password1']));
//$password2=trim(htmlspecialchars($_POST['password2']));
$passwd_crypt = password_hash($password1, PASSWORD_DEFAULT);

try {
    //conexion con la bda
    $config = require_once '../app/config.php';
    $connection = Connection::make($config['database']);
    $queryBuilder = new QueryBuilder($connection,'users', 'Usuario');
    $users = $queryBuilder->getUserExist($user);

    $json = array();
    foreach ($users as $user){

        $json[] = array(
            'id' => $user->getId(),
            'nombre' => $user->getNombre(),
            'apellidos' => $user->getApellidos(),
            'email' => $user->getEmail(),
            'fechaAlta' => $user->getFechaAlta()
        );
    }
    $jsonstring = json_encode($json);

    if ($jsonstring=='[]'){
        $queryBuilder->save(
            new Usuario(
                0,
                $nombre,
                $apellidos,
                $user,
                $passwd_crypt,
                date('Y-m-d', time())
            )
        );
    }
    echo $jsonstring;

}catch(QueryBuilderException $queryBuilderException) {
    $errores[]=$queryBuilderException->getMessage();
}

