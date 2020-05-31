<?php
session_start();
require 'entity/Usuario.php';

$user=isset($_SESSION['user']) ? unserialize($_SESSION['user']):NULL;

if ($user != NULL){
    header('Location:contactos.php');
    die();
}

include 'views/login.view.php';
