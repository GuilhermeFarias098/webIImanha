<?php
session_start();

if (empty($_POST)) {
  $_SESSION["msg_error"] = "Requisição inválida!!!";
  header("location:index.php");
}

// Validações

$initialPosition = $_POST["initialPosition"];
$velocity = $_POST["velocity"];
$time = $_POST["time"];

$finalPosition = calculateMRU($initialPosition, $velocity, $time);
$_SESSION["msg_success"] = "A posição final é de $finalPosition metros";
header("location:index.php");

function
calculateMRU($initialPosition, $velocity, $time)
{
  return $initialPosition + $velocity * $time;
}
