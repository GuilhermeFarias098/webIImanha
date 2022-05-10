<?php

namespace APP\Model\DAO;

use APP\Model\User;
use APP\Model\Connection;
use PDO;

class UserDAO
{
    private static $connection;

    public static function insert(User $user)
    {
        self::$connection = Connection::getConnection();
        $stmt = self::$connection->prepare("insert into usuario(login,senha) values (?,?)");
        $stmt->bindParam(1, $user->login, PDO::PARAM_STR);
        $stmt->bindParam(2, $user->password, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public static function authentication(User $user)
    {
        self::$connection = Connection::getConnection();
        $login = $user->login;
        $sql = "select * from usuario where login = '$login'";
        $stmt = self::$connection->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
