<?php
require '../database/Connection.php';
require '../database/QueryBuilder.php';
require '../entity/Contacto.php';
require '../entity/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $type = $_POST['type'];
    $id = trim(htmlspecialchars($_POST['id'])) ?: '';

    $config= require_once '../app/config.php';
    if ($type == 'solicitud'){

        try {
            //conexion con la bda
            $connection = Connection::make($config['database']);
            $queryBuilder = new QueryBuilder($connection,'contactos', 'Contacto');
            $contacto = $queryBuilder->findById($id);

            $json = array();
            $json[] = array(
                'id' => $contacto->getId(),
                'nombre' => $contacto->getNombre(),
                'contacto' => $contacto->getContacto(),
                'localizacion' => $contacto->getLocalizacion(),
                'telefono1' => $contacto->getTelefono1(),
                'telefono2' => $contacto->getTelefono2(),
                'email' => $contacto->getEmail(),
                'observaciones' => $contacto->getObservaciones(),
                'fecha' => $contacto->getFecha()
            );

            $jsonstring = json_encode($json);
            //echo 'success';
            echo $jsonstring;
        }catch(QueryBuilderException $queryBuilderException) {
            $errores[]=$queryBuilderException->getMessage();
            echo $errores;
        }

    }else{
        $nombre = trim(htmlspecialchars($_POST['nombre'])) ?: '';
        $contacto = trim(htmlspecialchars($_POST['contacto']));
        $localizacion = trim(htmlspecialchars($_POST['localizacion']));
        $telefono1 = trim($_POST['telefono1']) ?: 0;
        $telefono2 = trim($_POST['telefono2']) ?: 0;
        $email = trim(htmlspecialchars($_POST['email']));
        $observaciones = trim(htmlspecialchars($_POST['observaciones']));
        $fecha = trim(htmlspecialchars($_POST['fecha']));

        try {
            //conexion con la bda
            $connection = Connection::make($config['database']);
            $queryBuilder = new QueryBuilder($connection,'contactos', 'Contacto');
            $contact = $queryBuilder->findById($id);

            $contact->setId($id);
            $contact->setNombre($nombre);
            $contact->setContacto($contacto);
            $contact->setLocalizacion($localizacion);
            $contact->setTelefono1($telefono1);
            $contact->setTelefono2($telefono2);
            $contact->setEmail($email);
            $contact->setObservaciones($observaciones);
            $contact->setFecha($fecha);


            $queryBuilder->update($contact);
            echo 'success';


        }catch(QueryBuilderException $queryBuilderException) {
            $errores[]=$queryBuilderException->getMessage();
            echo $errores;
        }

    }






}

