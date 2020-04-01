<?php
session_start();

require '../entity/Usuario.php';

$user=isset($_SESSION['user']) ? unserialize($_SESSION['user']):NULL;

if ($user == NULL){
    header('Location: ../login.process.php');
    die();
}

$extension = explode(".",$_FILES['file-upload']['name']);
$extension = $extension[sizeof($extension)-1];

$ruta = "../imgs/profiles/profile";
$file = $ruta.$user->getId().".".$extension;
if ($_FILES['file-upload']['name'] == "") {
    header("Location: ../profile.php");
    die();
} else {
    if ($extension == "png" || $extension == "jpg" || $extension == "jpeg" || $extension == "gif") {

            if ($_FILES['file-upload']['size'] == 0) {
                header("Location: ../profile.php");
                die();
            } else {
                if (file_exists("../imgs/profiles/profile".$user->getId().".png")) {
                    unlink("../imgs/profiles/profile".$user->getId().".png");
                }
                if (file_exists("../imgs/profiles/profile".$user->getId().".jpg")) {
                    unlink("../imgs/profiles/profile".$user->getId().".jpg");
                }
                if (file_exists("../imgs/profiles/profile".$user->getId().".gif")) {
                    unlink("../imgs/profiles/profile".$user->getId().".gif");
                }
                if (file_exists("../imgs/profiles/profile".$user->getId().".jpeg")) {
                    unlink("../imgs/profiles/profile".$user->getId().".jpeg");
                }
                move_uploaded_file($_FILES['file-upload']['tmp_name'], $file);
                header("Location: ../profile.php");
                die();
            }

    } else {
        header("Location: ../profile.php");
        die();
    }
}

