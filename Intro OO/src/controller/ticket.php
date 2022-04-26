<?php

namespace APP\Controller;

use APP\Model\Ticket;

session_start();
if (!$_POST) {
    $_SESSION["msg_error"] = "Requisição inválida!!!";
    header("location:../view/message.php");
}

$id = (int) floor(10);
$seat = $_POST["seat"];
$price = $_POST["price"];

$ticket_obj = Ticket();
