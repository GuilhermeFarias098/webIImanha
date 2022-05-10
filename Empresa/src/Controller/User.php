<?php

namespace APP\Controller;

use APP\Model\DAO\UserDAO;
use APP\Model\User;
use APP\Model\Validation;

require_once "../../vendor/autoload.php";

session_start();
if (empty($_POST) && empty($_GET)) {
    $_SESSION["msg_error"] = "Requisição inválida";
    header("../View/Message.php");
}

switch ($_GET["operation"]) {
    case "login":
        login();
        break;
    case "insert":
        insertUser();
        break;
    default:
        echo "Opção inválida";
}

function insertUser()
{
    $error = array();

    if (!isset($_POST["login"])) {
        array_push($error, "Campo de login não localizado!!!");
    }

    if (!isset($_POST["password"])) {
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
}

function login()
{
    $error = array();

    if (!isset($_POST["login"])) {
        array_push($error, "Campo de login não localizado!!!");
    }

    if (!isset($_POST["password"])) {
        array_push($error, "Campo de senha não localizado!!!");
    }

    redirect($error);

    $login = $_POST["login"];
    $password = $_POST["password"];

    $user = new User($login, $password);

    $data = UserDAO::authentication($user);
    if ($data) {
        if (password_verify($password, $data["senha"])) {
            $_SESSION["userData"] = $user;
            header("location:../View/Dashboard.php");
        } else {
            $_SESSION["msg_verify_error"] = array("Login ou senha inválida!!!");
            header("location:../View/Message.php");
        }
    } else {
        $_SESSION["msg_verify_error"] = array("Usuário não localizado!!!");
        header("location:../View/Message.php");
    }
}

function redirect(array $error, string $location = "../View/Message.php")
{
    if (count($error) > 0) {
        $_SESSION["msg_verify_error"] = $error;
        header("location:$location");
        die;
    }
}
