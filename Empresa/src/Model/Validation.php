<?php

namespace APP\Model;

class Validation
{
    public static function validateLogin(string $login): bool
    {
        return strlen($login) > 7;
    }

    public static function validatePassword(string $password): bool
    {
        return strlen($password) > 7;
    }
}
