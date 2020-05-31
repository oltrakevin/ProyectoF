<?php

require '../database/Connection.php';
require '../database/QueryBuilder.php';
require '../entity/Contacto.php';
require '../entity/Empresa.php';

try {
    //conexion con la bda
    $config = require_once '../app/config.php';
    $connection = Connection::make($config['database']);

    $queryBuilder = new QueryBuilder($connection,'empresas', 'Empresa');
    $empresas = $queryBuilder->findAll();

    $arrayEmpresas = [];
    foreach ($empresas as $empresa){
        $arrayEmpresas[$empresa->getCif()] = $empresa->toArray();
    }

    $search = $_POST['search'];

//    if (!empty($search)){
    $queryBuilder = new QueryBuilder($connection,'Contactos', 'Contacto');
    $contactos = $queryBuilder->findAll();

    $busqueda = $queryBuilder->findSearch($search);

    $json = array();

    foreach ($busqueda as $contacto){
//            $ciclos = $queryBuilder->injectSQLObject('SELECT c.nombre FROM ciclo c INNER JOIN contactociclo USING (id) WHERE cif=$contacto-','Ciclo');

        $json[] = array(
            'id' => $contacto->getId(),
            'nombre' => $contacto->getNombre(),
            'contacto' => $contacto->getContacto(),
            'localizacion' => $contacto->getLocalizacion(),
            'localidad' => $contacto->getLocalidad(),
            'cp' => $contacto->getCp(),
            'telefono1' => $contacto->getTelefono1(),
            'telefono2' => $contacto->getTelefono2(),
            'email' => $contacto->getEmail(),
            'observaciones' => $contacto->getObservaciones(),
            'fecha' => $contacto->getFechaFormat(),
            'empresa' => $arrayEmpresas[$contacto->getNombre()] ?? []

        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;

//}
//        $query = "SELECT * FROM contactos WHERE nombre LIKE '%$search%' ";
//        $result = mysqli_query($connection, $query);
//        if (!$result){
//            die('Query Error' . mysqli_error($connection));
//        }
//
//        $json = array();
//        while ($row = mysqli_fetch_array($result)){
//            $json[] = array(
//                'nombre' => $row['nombre'],
//                'contacto' => $row['contacto'],
//                'localizacion' => $row['localizacion'],
//                'localizacion' => $row['localizacion'],
//                'telefono1' => $row['telefono1'],
//                'telefono2' => $row['telefono2'],
//                'email' => $row['email'],
//                'observaciones' => $row['observaciones'],
//                'fecha' => $row['fecha']
//
//            );
//        }
//        $jsonstring = json_encode($json);
//        echo $jsonstring;
//   }

}catch(QueryBuilderException $queryBuilderException) {
    $errores[]=$queryBuilderException->getMessage();
}

