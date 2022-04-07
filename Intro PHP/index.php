<?php
// Formas simples
// echo("Hello World!!!");
// echo "Hello my friend!!!";
// echo "<p>Who are you?</p>";

// print("<p>Hey, what's your name?</p>");
// print "<p>Hey, what's your name?</p>";

// Formas detalhadas
// var_dump("PHP");
// echo "<br>";
// var_export("12");
// echo "<br>";
// var_export(12);
// echo "<br>";
// print_r("PHP");

// Variáveis
// $nome = "Anderson";
// $idade = 30;
// $eProfessor = true;
// $salario = 5000.0;

// $booleano = (bool) 0.0;

// var_dump($nome);
// echo "<br>";
// var_dump($idade);
// echo "<br>";
// var_dump($eProfessor);
// echo "<br>";
// var_dump($salario);
// echo "<br>";
// var_dump($booleano);

echo somar(34,90);
echo "<br>";
echo subtrair(12,56);
echo "<br>";
echo somar("-1",29);

function somar($num1,$num2){
    return $num1 + $num2;
}

function subtrair($num1,$num2){
    return $num1 - $num2;
}

function multiplicacao($num1,$num2){
    return $num1 * $num2;
}

function dividir($num1,$num2){
    return $num1 / $num2;
}