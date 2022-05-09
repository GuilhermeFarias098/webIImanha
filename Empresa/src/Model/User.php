<?php

namespace APP\Model;

class User
{
    private int $id;
    private string $login;
    private string $password;

    public function __construct(string $login, string $password, int $id = 0)
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
    }

    public function __get($attribute)
    {
        return $this->$attribute;
    }
}
