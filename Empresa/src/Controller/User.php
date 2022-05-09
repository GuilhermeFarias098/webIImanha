<?php

namespace APP\Controller;

use APP\Model\DAO\UserDAO;
use APP\Model\User;
use APP\Model\Validation;

require_once "../../vendor/autoload.php";

session_start();
if (empty($_POST)) {
    $_SESSION["msg_error"] = "Requisição inválida";
    header("../View/Message.php");
}

$error = array();

if (empty($_POST["login"])) {
    array_push($error, "Campo de login não localizado!!!");
}

if (empty($_POST["password"])) {
    array_push($error, "Campo de senha não localizado!!!");
}

redirect($error);

$login = $_POST["login"];
$password = $_POST["password"];

if (!Validation::validateLogin($login)) {
    array_push($error, "Login deve conter no mínimo 8 caracteres entre números e letras");
}

if (!Validation::validatePassword($password)) {
    array_push($error, "Senha deve conter no mínimo 8 caracteres entre números e letras");
}

redirect($error);

// Modelo do User
$objUser = new User($login, password_hash($password, PASSWORD_DEFAULT));

$result = UserDAO::insert($objUser);

if ($result != 0) {
    $_SESSION["msg_success"] = "Usuário cadastrado com sucesso!!!";
} else {
    $_SESSION["msg_error"] = "Lamento, não foi possível cadastrar o usuário!!!";
}
header("location:../View/Message.php");
function redirect(array $error, string $location = "../View/Message.php")
{
    if (count($error) > 0) {
        $_SESSION["msg_verify_error"] = $error;
        header("location:$location");
    }
}
