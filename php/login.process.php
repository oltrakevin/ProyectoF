<?php
session_start();

require '../database/Connection.php';
require '../database/QueryBuilder.php';
require '../entity/Usuario.php';

$user=trim(htmlspecialchars($_POST['email']));
$password=trim(htmlspecialchars($_POST['password']));

try {
    //conexion con la bda
    $config = require_once '../app/config.php';
    $connection = Connection::make($config['database']);
    $queryBuilder = new QueryBuilder($connection,'users', 'Usuario');
    $users = $queryBuilder->getUser($user,$password);

        $json = array();

        foreach ($users as $user){

            $_SESSION['user']=serialize($user);// cambia objeto a string

            $json[] = array(
                'id' => $user->getId(),
                'nombre' => $user->getNombre(),
                'apellidos' => $user->getApellidos(),
                'email' => $user->getEmail(),
                'fechaAlta' => $user->getFechaAlta()
            );
        }

        $jsonstring = json_encode($json);
        echo $jsonstring;

}catch(QueryBuilderException $queryBuilderException) {
    $errores[]=$queryBuilderException->getMessage();
}

