<?php

function nameValidate($name)
{
    return strlen($name) >= 3 && !is_numeric($name);
}

function emailValidate($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function passwordValidate($password)
{
    return strlen($password) >= 8;
}

function cpfValidate($cpf)
{
    return preg_match("/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/", $cpf);
}

function dateValidate($date)
{
    $date = explode("-", $date);
    return checkdate($date[1], $date[2], $date[0]);
}
