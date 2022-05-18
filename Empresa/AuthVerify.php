<?php
function authVerify()
{
    session_start();
    if (empty($_SESSION["userData"])) {
        header("location:../../index.html");
    }
}
