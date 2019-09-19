<?php
header("Content-type: text/html; charset=utf-8");
    echo "Cálculo de Média de 10 Valores";
    $media = 0.0;

    for ($i=1; $i <= 10; $i++){
        
        $media += $_GET["n" . $i];
        
        echo "<br />Valor $i: " . $_GET["n" . $i];
    }

    $media = $media / 10.0;

    echo "<br />A média dos valores informados é: $media";

?>