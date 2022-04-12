<?php
require "validations.php";

session_start();
if (empty($_POST)) {
    $_SESSION["msg_error"] = "Nenhuma requisição localizada!!!";
    header("location:message.php");
}

// Debug dos dados recebidos
// var_dump($_POST);

$name = $_POST["txtName"];
$birthday = $_POST["txtBirthday"];
$cpf = $_POST["txtcpf"];
$login = $_POST["txtLogin"];
$password = $_POST["txtPassword"];

// Array de erros
$error = array();

if (!nameValidate($name)) {
    array_push($error, "Nome inválido!!!");
}

if (!dateValidate($birthday)) {
    array_push($error, "Data de nascimento inválida!!!");
}

if (!emailValidate($login)) {
    array_push($error, "Login inválido!!!");
}

if (!passwordValidate($password)) {
    array_push($error, "Senha inválida!!!");
}

if (!cpfValidate($cpf)) {
    array_push($error, "CPF inválido!!!");
}

if (count($error) > 0) {
    $_SESSION["msg_validation_error"] = $error;
} else {
    $_SESSION["msg_success"] = "Cadastro realizado com sucesso!!!";
}

header("location:message.php");
