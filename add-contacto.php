<?php
session_start();
require 'database/Connection.php';
require 'database/QueryBuilder.php';
require 'entity/Empresa.php';
require 'entity/Contacto.php';
require 'entity/Usuario.php';

$user=isset($_SESSION['user']) ? unserialize($_SESSION['user']):NULL;

if ($user == NULL){
    header('Location:login.process.php');
    die();
}

$image = $user->getProfilePicture();

$config= require_once 'app/config.php';
$connection = Connection::make($config['database']);
$queryBuilder = new QueryBuilder($connection,'empresas', 'Empresa');
$empresas = $queryBuilder->findAll();



include 'views/add-contacto.view.php';