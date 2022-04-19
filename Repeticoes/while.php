<?php

$contador = 1;

while($contador <=100){
    echo "<p>O valor atual da contagem é: $contador</p>";
    $contador++;
}

while($contador <=100){
    if($contador % 2 == 0){
        echo "<p>$contador é par!!!</p>";
    }
    $contador++;
}

while ($contador <= 10) {
    if ($contador == 4 || $contador == 8) {
        echo "<p>Foi o número</p>";
        $contador++;
        continue;
    }
    echo "<p>$contador</p>";
    $contador++;
}
