<?php
session_start();
require '../database/Connection.php';
require '../database/QueryBuilder.php';
require '../entity/Usuario.php';

$user=isset($_SESSION['user']) ? unserialize($_SESSION['user']):NULL;

if ($_SERVER['REQUEST_METHOD']=== 'POST') {
    $id=$_POST['id'];
    $name=trim(htmlspecialchars($_POST['name']));
    $lastname=trim(htmlspecialchars($_POST['lastname']));
    $email=trim(htmlspecialchars($_POST['email']));
    $date=trim(htmlspecialchars($_POST['date']));
    $oldpass=trim(htmlspecialchars($_POST['oldpass']));
    $newpass=trim(htmlspecialchars($_POST['newpass']));

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
        $queryBuilder = new QueryBuilder($connection,'users', 'Usuario');

        if (!isset($id)) echo 'error';
        else{
            $user= $queryBuilder->findById($id);

            $user->setNombre($name);
            $user->setApellidos($lastname);
            $user->setEmail($email);
            $user->setFechaAlta($date);
            if (isset($oldpass) && isset($newpass)){
                if ($oldpass == $user->getPassword())
                    $user->setPassword($newpass);
                else
                    echo 'Contraseña Actual no valida';
            }

            $queryBuilder->update($user);
            echo 'success';
            $_SESSION['user']=serialize($user);

        }

    }catch(QueryBuilderException $queryBuilderException) {
        $errores[]=$queryBuilderException->getMessage();
    }
}
