<?php
session_start();
var_dump($_SESSION['sesioniniciada']);
unset($_SESSION['sesioniniciada']);
var_dump($_SESSION['sesioniniciada']);

header('Location:login.process.php');