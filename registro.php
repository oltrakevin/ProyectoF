<?php
session_start();
require "utils/funciones.php";

    if ($_SERVER['REQUEST_METHOD']=== 'POST') {
//       var_dump($_POST);

        $errores=validarRegistro();

        if (empty($errores)) {
            $nombre = trim(htmlspecialchars($_POST['name'])) ? : '';
            $email = trim(htmlspecialchars($_POST['email'])) ? : '';
            $password1 = trim(htmlspecialchars($_POST['password1']))? : '';
            $password2 = trim(htmlspecialchars($_POST['password2']))? : '';
            $sexo = ($_POST['sexo']) ? : '';
            //$terms_conditions=trim(htmlspecialchars($_POST['terms-conditions']));

            $usuario = [
                'nombre' => $nombre,
                'email' => $email,
                'password' => $password1,
                'sexo' => $sexo,
            ];

            $_SESSION['usuarios'] [] = $usuario;
            header('Location:login.process.php');
        }
    }
require "views/registro.view.php";

