<?php

namespace APP\Model;

use PDO;

class Connection
{
    private static $connection;
    public static function getConnection()
    {
        if (empty(self::$connection)) {
            self::$connection = new PDO(
                DNS,
                USER,
                PASSWORD,
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                )
            );
        }
        return self::$connection;
    }
}
