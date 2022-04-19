<?php
// Declarando coleções
$alunos = ["Paulo", "Julia", "Maria"];
$professores = array("Nicolas", "Claudia", "Gilberto");


imprimirDados($alunos);
imprimirDados($professores);

// Adicionar elemento no final
array_push($alunos, "Thiago", "Juliana");

// Adicionar elemento no inicio
array_unshift($professores, "Renata", "Cléber");

imprimirDados($alunos);
imprimirDados($professores);

// Remover elemento do final
array_pop($alunos);

// Remover elemento do inicio
array_shift($professores);

imprimirDados($alunos);
imprimirDados($professores);

mostraTamanho($professores);








function imprimirDados($colecao)
{
    echo "<pre>";
    var_dump($colecao);
    echo "</pre>";
}

function mostraTamanho($colecao)
{
    echo "<p>A coleção contêm " . count($colecao) . " itens</p>";
}
