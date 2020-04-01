<?php
function validarRegistro(){
    $errores=[];
//--nombre
    if(empty($_POST["name"]) || strlen($_POST["name"]) < 5 ){
        $errores[] = "El nombre es REQUERIDO y mayor a 5 caracteres";
    }
    if (!preg_match('`[A-Z]`',$_POST["name"])){
        $errores[] = "El Nombre ha de tener mayusculas";
    }
    if (!preg_match('`[a-z]`',$_POST["name"])){
        $errores[] = "El Nombre ha de tener  Minusculas";
    }
//--email
    if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) || empty($_POST["email"])){
        $errores[] = "No se ha indicado email o el formato no es correcto";
    }
//--password
    if(empty($_POST["password1"]) || empty($_POST["password2"]) || strlen($_POST["password1"]) < 5 || strlen($_POST["password2"]) < 5 ) {
        $errores[] = "La contraseña es REQUERIDA y ha de ser mayor a 5 caracteres";
    }
    if (!preg_match('`[a-z]`',$_POST["password1"])){
        $errores[] = "La clave debe tener al menos una letra minúscula";
    }
    if (!preg_match('`[A-Z]`',$_POST["password1"])){
        $errores[] = "La clave debe tener al menos una letra mayúscula";
    }
    if (!preg_match('`[0-9]`',$_POST["password1"])){
        $errores[] = "La clave debe tener al menos un caracter numérico";
    }
    if($_POST["password1"] != $_POST["password2"]){
        $errores[] = "Las contraseñas No Coinciden";
    }

    return $errores;
}

function mostrarLogeado($usuario){
    echo "<table class='table table-striped' style=' width: auto'>";
    echo "<th colspan='3'>";
    echo "<p>Datos de Usuarios logeado</p>";
    echo "</th>";
    echo "<tr>";
    echo "<th  colspan='1'>Nombre</th>";
    echo "<th  colspan='1'>Email</th>";
    echo "<th  colspan='1'>Sexo</th>";
    echo "</tr>";
    echo "<tr>";
    foreach ($usuario as $value){
        echo "<td style=''>";
        echo "<p> $value </p>";
        echo "</td>";
    }
    echo "</tr>";
    echo "</table>";
}

function mostrarUsuario($usuarios){
    echo "<table class='table table-striped' style=' width: auto'>";
    echo "<tr>";
    echo "<th  colspan='4'>Datos de Usuarios</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<th  colspan='1'>Nombre</th>";
    echo "<th  colspan='1'>Email</th>";
    echo "<th  colspan='1'>Password</th>";
    echo "<th  colspan='1'>Sexo</th>";
    echo "</tr>";

    foreach ($usuarios as $usuario) {
        echo "<tr>";
        foreach ($usuario as $value) {
            echo "<td>";
            echo "$value";
            echo "</td>";
        }

    }
    echo "</tr>";
    echo "</table>";
}


function validarContactos(){
    $errores=[];
//--nombre
    if(empty($_POST["nombre"])){
        $errores['nombre'] = "El Nombre de la Empresa es REQUERIDO";
    }
//--contacto
    if(empty($_POST["contacto"])){
        $errores['contacto'] = "El Nombre del Contacto es REQUERIDO";
    }
//--localizacion
    if(empty($_POST["localizacion"])){
        $errores['localizacion'] = "La localizacion es REQUERIDA";
    }
//--telefono1
    if(empty($_POST["telefono1"])){
        $errores['telefono1'] = "El telefono1 es REQUERIDO";
    }
//--telefono2
//--email
    if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) || empty($_POST["email"])){
        $errores['email'] = "No se ha indicado email o el formato no es correcto";
    }
//--observaciones

    return $errores;

}
