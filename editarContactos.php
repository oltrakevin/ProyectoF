<?php
session_start();

require 'database/Connection.php';
require 'database/QueryBuilder.php';
require 'entity/Contacto.php';

if (!isset($_SESSION['sesioniniciada']))
    header('Location:login.process.php');

$errores=[];
try {
    //conexion con la bda
    $config=require_once 'app/config.php';
    $connection = Connection::make($config['database']);
    $queryBuilder = new QueryBuilder($connection,'contactos', 'Contacto');

    if (!isset($_REQUEST['id'])) header('Location:contactos.php');
    else{
        $id=$_REQUEST['id'];
        $contacto1 = $queryBuilder->findById($id);


        if($_SERVER['REQUEST_METHOD']==='POST') {
            $nombre=trim(htmlspecialchars($_POST['nombre']));
            //$imagen=trim(htmlspecialchars($_POST['imagen']));
            //$fichero=$_FILES['imagen'];
            $contacto=trim(htmlspecialchars($_POST['contacto']));
            $localizacion=trim(htmlspecialchars($_POST['localizacion']));
            $telefono1=trim($_POST['telefono1']);
            $telefono2=trim($_POST['telefono2']);
            $email=trim(htmlspecialchars($_POST['email']));
            $observaciones=trim(htmlspecialchars($_POST['observaciones']));
            $fecha=date('Y-m-d');

            $errores = [];

            /*if (empty($errores)) {

                if (!empty($fichero['name'])) {
                    //nombre original del fichero cuando se subió al servidor
                    $nombreFichero = $fichero['name'];
                    $ruta = $carpetaDestino . $nombreFichero;
                    // Si existe un fichero con ese nombre generamos otro
                    if (is_file($ruta)) {
                        $idUnico = time();
                        $nombreFichero = $idUnico . $nombreFichero;
                        $ruta = $carpetaDestino . $nombreFichero;
                    }
                    //movemos fichero del directorio temporal donde se ha subido a su destino
                    //esta función devuelve falso si no se mover el fichero a su destino
                    move_uploaded_file($fichero['tmp_name'], $ruta);

                    $producto->setImagen($nombreFichero);
                }*/

            $contacto1->setNombre($nombre);
            $contacto1->setContacto($contacto);
            $contacto1->setLocalizacion($localizacion);
            $contacto1->setTelefono1($telefono1);
            $contacto1->setTelefono2($telefono2);
            $contacto1->setEmail($email);
            $contacto1->setObservaciones($observaciones);
            $contacto1->setFecha($fecha);

                $queryBuilder->update($contacto1);

                header('Location:contactos.php');
            }
        }
    //}

}catch(QueryBuilderException $queryBuilderException) {
    $errores[]=$queryBuilderException->getMessage();
}

require 'views/editarContactos.views.php';