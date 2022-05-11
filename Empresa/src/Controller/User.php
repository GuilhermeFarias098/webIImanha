<?php

namespace APP\Controller;

use APP\Model\DAO\UserDAO;
use APP\Model\User;
use APP\Model\Validation;

require_once "../../vendor/autoload.php";

session_start();
if (!isset($_POST) && !isset($_GET)) {
    $_SESSION["msg_error"] = "Requisição inválida!!!";
    header("location:../View/Message.php");
}

if (empty($_GET["operation"])) {
    $_SESSION["msg_error"] = "Operação não informada!!!";
    header("location:../View/Message.php");
}

switch ($_GET["operation"]) {
    case "login":
        login();
        break;
    case "insert":
        insertUser();
        break;
    case "update":
        updateUser();
        break;
    case "remove":
        deleteUser();
        break;
    default:
        echo "Opção inválida!!!";
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
        if (password_verify($password, $data["password"])) {
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
function updateUser()
{
    $error = array();

    if (!isset($_POST["id"])) {
        array_push($error, "Campo de código não localizado!!!");
    }

    if (!isset($_POST["login"])) {
        array_push($error, "Campo de login não localizado!!!");
    }

    if (!isset($_POST["password"])) {
        array_push($error, "Campo de senha não localizado!!!");
    }

    redirect($error);

    $id = $_POST["id"];
    $login = $_POST["login"];
    $password = $_POST["password"];

    if (!Validation::validateId($id)) {
        array_push($error, "Campo de código do cliente inválido!!!");
    }

    if (!Validation::validateLogin($login)) {
        array_push($error, "Campo de login deve conter no mínimo 8 caracteres entre números e letras");
    }

    if (!Validation::validatePassword($password)) {
        array_push($error, "Campo de senha deve conter no mínimo 8 caracteres entre números e letras");
    }

    redirect($error);

    $objUser = new User(id: $id, login: $login, password: password_hash($password, PASSWORD_DEFAULT));

    $result = UserDAO::update($objUser);

    if ($result != 0) {
        $_SESSION["msg_success"] = "Usuário atualizado com sucesso!!!";
    } else {
        $_SESSION["msg_error"] = "Lamento, não foi possível atualizar o usuário";
    }
    header("location:../View/Message.php");
}
function deleteUser()
{
    $error = array();

    if (empty($_GET["codigo"])) {
        array_push($error, "Código do usuário não informado!!!");
    }
    redirect($error);

    $id = $_GET["codigo"];

    if (!Validation::validateId($id)) {
        array_push($error, "O código do usuário deve ser numérico!!!");
    }
    redirect($error);

    $result = UserDAO::delete($id);
    if ($result != 0) {
        $_SESSION["msg_success"] = "Usuário removido com sucesso!!!";
    } else {
        $_SESSION["msg_error"] = "Lamento, não foi possível remover o usuário em questão";
    }
    header("location:../View/Message.php");
}
function redirect(array $error, string $location = "../View/Message.php")
{
    if (count($error) > 0) {
        $_SESSION["msg_verify_error"] = $error;
        header("location:$location");
        die;
    }
}
