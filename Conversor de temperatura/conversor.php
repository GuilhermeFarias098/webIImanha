<?php
session_start();
if (!$_GET["temperature"] || !$_GET["txtCelsius"]) {
    $_SESSION["msg_error"] = "Requisição inválida!!!";
    header("location:index.php");
}

$celsius = $_GET["txtCelsius"];
$result = 0;

switch ($_GET["temperature"]) {
    case "Fahrenheit":
        $result = toFahrenheit($celsius);
        $_SESSION["msg_value"] = "$celsius °C para Fahrenheit é $result";
        break;
    case "Kelvin":
        $result = toKelvin($celsius);
        $_SESSION["msg_value"] = "$celsius °C para Kelvin é $result";
        break;
    case "Rankine":
        $result = toRankine($celsius);
        $_SESSION["msg_value"] = "$celsius °C para Rankine é $result";
        break;
    default:
        $_SESSION["msg_error"] = "A temperatura para conversão é inválida!!!";
}
header("location:index.php");

// Funções de conversão
function toFahrenheit($celsius)
{
    return $celsius * 1.8 + 32;
}

function toKelvin($celsius)
{
    return $celsius + 273.15;
}

function toRankine($celsius)
{
    return $celsius * 1.8 + 491.67;
}
