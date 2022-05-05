<?php

namespace APP\Model;

class User
{
    private int $id;
    private string $login;
    private string $password;

    public function __construct(int $id = 0, string $login, string $password)
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
