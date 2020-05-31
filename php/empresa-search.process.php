<?php

require '../database/Connection.php';
require '../database/QueryBuilder.php';
require '../entity/Empresa.php';
require '../entity/Ciclo.php';

function getCiclos($ciclos){
    $result='';
    foreach ($ciclos as $ciclo){
        $result.=$ciclo->getCiclo().', ';
    }
    return $result;
}

try {
    //conexion con la bda
    $config = require_once '../app/config.php';
    $connection = Connection::make($config['database']);
    $queryBuilder = new QueryBuilder($connection,'empresas', 'Empresa');
    $empresas = $queryBuilder->findAll();

    $search = $_POST['search'];

//    if (!empty($search)){

    $busqueda = $queryBuilder->findSearch($search);

    $json = array();

    foreach ($busqueda as $empresa){
//        echo "SELECT ci.id,ci.ciclo FROM ciclo ci INNER JOIN empresaciclo e USING (id) WHERE e.cif='".$empresa->getCif()."'";
        $ciclos = $queryBuilder->injectSQLObject("SELECT ci.id,ci.ciclo FROM ciclo ci INNER JOIN empresaciclo e USING (id) WHERE e.cif='".$empresa->getCif()."'",'Ciclo');

        $json[] = array(
            'cif' => $empresa->getCif(),
            'nombre' => $empresa->getNombre(),
            'localizacion' => $empresa->getLocalizacion(),
            'localidad' => $empresa->getLocalidad(),
            'cp' => $empresa->getCp(),
            'telefono1' => $empresa->getTelefono1(),
            'email' => $empresa->getEmail(),
            'observaciones' => $empresa->getObservaciones(),
            'fecha' => $empresa->getFechaFormat(),
            'ciclos'=> getCiclos($ciclos)

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

