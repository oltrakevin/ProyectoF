<?php
require '../database/Connection.php';
require '../database/QueryBuilder.php';
require '../entity/Empresa.php';
require '../entity/EmpresaCiclo.php';
require '../entity/Usuario.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $type = $_POST['type'];
    $cif = isset($_POST['cif']) ? trim(htmlspecialchars($_POST['cif'])): '';
//    echo $cif;
    $config= require_once '../app/config.php';
    if ($type == 'solicitud'){

        try {
            //conexion con la bda
            $connection = Connection::make($config['database']);
            $queryBuilder = new QueryBuilder($connection,'empresas', 'Empresa');
            $empresa = $queryBuilder->findByCif($cif);

            $json = array();
            $json[] = array(
                'cif' => $empresa->getCif(),
                'nombre' => $empresa->getNombre(),
                'localizacion' => $empresa->getLocalizacion(),
                'localidad' => $empresa->getLocalidad(),
                'cp' => $empresa->getCp(),
                'telefono1' => $empresa->getTelefono1(),
                'email' => $empresa->getEmail(),
                'observaciones' => $empresa->getObservaciones(),
                'fecha' => $empresa->getFecha()
            );
            $jsonstring = json_encode($json);
            //echo 'success';
            echo $jsonstring;
        }catch(QueryBuilderException $queryBuilderException) {
            $errores[]=$queryBuilderException->getMessage();
            echo $errores;
        }

    }else{
        $cif = trim(htmlspecialchars($_POST['cif'])) ?: '';
        $nombre = trim(htmlspecialchars($_POST['nombre'])) ?: '';
        $localizacion = trim(htmlspecialchars($_POST['localizacion']));
        $localidad = trim(htmlspecialchars($_POST['localidad']));
        $cp = trim(htmlspecialchars($_POST['cp']));
        $telefono1 = trim($_POST['telefono1']) ?: 0;
        $email = trim(htmlspecialchars($_POST['email']));
        $observaciones = trim(htmlspecialchars($_POST['observaciones']));
        $fecha = trim(htmlspecialchars($_POST['fecha']));
        $ciclos = $_POST['ciclos'];

        try {
            //conexion con la bda
            $connection = Connection::make($config['database']);
            $queryBuilder = new QueryBuilder($connection,'empresas', 'Empresa');
            $empresa = $queryBuilder->findByCif($cif);

            $empresa->setCif($cif);
            $empresa->setNombre($nombre);
            $empresa->setLocalizacion($localizacion);
            $empresa->setLocalidad($localidad);
            $empresa->setCp($cp);
            $empresa->setTelefono1($telefono1);
            $empresa->setEmail($email);
            $empresa->setObservaciones($observaciones);
            $empresa->setFecha($fecha);

            $queryBuilder->updateEmpresa($empresa);

            $queryBuilder = new QueryBuilder($connection,'empresaciclo', 'EmpresaCiclo');
            $empresasciclo = $queryBuilder->findAllByCif($cif);

            $ciclosActuales = [];
            foreach ($empresasciclo as $empresaciclo){
                $ciclosActuales[] = $empresaciclo->getId();
            }
            $anadir = array_diff($ciclos,$ciclosActuales);
            $borrar = array_diff($ciclosActuales,$ciclos);

            foreach ($anadir as $id){
                $ciclo = new EmpresaCiclo($cif,$id);
                $queryBuilder->save($ciclo);
            }
            foreach ($borrar as $id){
                $ciclo = $queryBuilder->findSearch([$cif,$id])[0];
                $queryBuilder->delete($ciclo);
            }
            echo 'success';


        }catch(QueryBuilderException $queryBuilderException) {
            $errores=$queryBuilderException->getMessage();
            echo $errores;
        }

    }






}

