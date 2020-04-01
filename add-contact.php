<?php
session_start();
require 'entity/Usuario.php';

$user=isset($_SESSION['user']) ? unserialize($_SESSION['user']):NULL;

if ($user == NULL){
    header('Location:login.process.php');
    die();
}

$image = $user->getProfilePicture();



include 'views/add-contact.view.php';