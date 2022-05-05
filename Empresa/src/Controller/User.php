<?php

namespace APP\Controller;

use APP\Model\Connection;

require_once "../../vendor/autoload.php";

$connection = Connection::getConnection();

var_dump($connection);
