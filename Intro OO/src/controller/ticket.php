<?php

namespace APP\Controller;

require_once "../../vendor/autoload.php";

use APP\Model\Ticket;

session_start();
if (!$_POST) {
    $_SESSION["msg_error"] = "Requisição inválida!!!";
    header("location:../view/message.php");
}

$id = (int) floor(10);
$seat = $_POST["seat"];
$price = $_POST["price"];
$typeOfUser = $_POST["typeOfUser"];

$ticket_obj = new Ticket($id, $price, $seat);
$result = $ticket_obj->saleTicket($typeOfUser);
$_SESSION["msg_success"] = $result;
header("location:../view/message.php");
