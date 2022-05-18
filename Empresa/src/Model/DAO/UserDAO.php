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

    public static function update(User $user)
    {
        self::$connection = Connection::getConnection();
        $stmt = self::$connection->prepare("update usuario set login = ?, senha= ? where idUsuario=?");
        $stmt->bindParam(1, $user->login, PDO::PARAM_STR);
        $stmt->bindParam(2, $user->password, PDO::PARAM_STR);
        $stmt->bindParam(3, $user->id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public static function delete(int $id)
    {
        self::$connection = Connection::getConnection();
        $stmt = self::$connection->prepare("delete from usuario where idUsuario = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public static function findAll()
    {
        self::$connection = Connection::getConnection();
        $stmt = self::$connection->query(query: "select idUsuario,login from usuario order by idUsuario", fetchMode: PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public static function findById(int $id)
    {
        self::$connection = Connection::getConnection();
        $stmt = self::$connection->query("select idUsuario,login from usuario where idUsuario='$id'");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
