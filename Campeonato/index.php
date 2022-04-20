<?php
// Criação da coleção (Pode estar vazia ou não)
$campeonato = array();

echo contarTimes();

if (adicionarTime("Grêmio")) {
    echo "<p>Grêmio foi adicionado com sucesso!!!</p>";
}
if (adicionarTime("Internacional")) {
    echo "<p>Internacional foi adicionado com sucesso!!!</p>";
}
if (adicionarTime("Palmeiras")) {
    echo "<p>Palmeiras foi adicionado com sucesso!!!</p>";
}

echo contarTimes();

echo buscarTimes("Grêmio");

if(editarTime("Internacional", "Inter")){
    echo "<p>Time editado com sucesso!!!</p>";
}else{
    echo "<p>Não foi possível editar o time!!!</p>";
}

echo buscarTimes("Inter");

echo listarTimes();

removerTime("Inter");

echo listarTimes();

/**
 * Adiciona um novo time ao campeonato
 *
 * @param mixed $nomeDoTime
 * @return int|false
 */
function adicionarTime($nomeDoTime)
{
    if (!empty($nomeDoTime) && !in_array($nomeDoTime, $GLOBALS["campeonato"])) {
        return array_push($GLOBALS["campeonato"], $nomeDoTime);
    }
    return false;
}
/**
 * Conta o número de times no campeonato
 *
 * @return string
 */
function contarTimes()
{
    $qtd = count($GLOBALS["campeonato"]);
    return "<p>Atualmente temos $qtd times</p>";
}
/**
 * Busca um time pelo nome
 *
 * @param string $nome
 * @return string
 */
function buscarTimes($nome)
{
    $resultado = array_search($nome, $GLOBALS["campeonato"]);
    if ($resultado > -1) {
        $time = $GLOBALS["campeonato"][$resultado];
        return "<p>O time $time foi localizado!!!</p>";
    }
    return "<p>O time não foi localizado!!!</p>";
}
/**
 * Editar o nome de um time presente no campeonato
 *
 * @param string $antigoNome
 * @param string $novoNome
 * @return bool
 */
function editarTime($antigoNome,$novoNome)
{
    $chave = array_search($antigoNome,$GLOBALS["campeonato"]);

    if($chave>-1){
        $GLOBALS["campeonato"][$chave] = $novoNome;
        return true;
    }
    return false;
}
/**
 * Cria uma lista html ordenada contendo os times do campeonato
 *
 * @return string
 */
function listarTimes()
{
    $html = "<h3>Lista de times</h3><ol>";
    foreach($GLOBALS["campeonato"] as $time){
        $html .= "<li>$time</li>";
    }
    $html .= "</ol>";
    return $html;
}
/**
 * Remove um time do campeonato
 *
 * @param string $nome
 * @return void
 */
function removerTime($nome)
{
    $colecaoAuxiliar = array();

    foreach($GLOBALS["campeonato"] as $time){
        if($time != $nome){
            array_push($colecaoAuxiliar,$time);
        }
    }
    $GLOBALS["campeonato"] = $colecaoAuxiliar;
}