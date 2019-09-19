<?php

    $a = array(10,15,20,25,30,35,40);
    
    $soma = 0;
    $mult = 1;
    for($i=0; $i<7; $i++){
        $soma += $a[$i];
        $mult *= $a[$i];
    }
    echo "A Soma dos elementos do vetor A é $soma<br/>";
    echo "A Multiplicação dos elementos do vetor A é $mult<br/>";

    //com FOREACH
    $soma=0; $mult=1;
    foreach($a as $num){
        $soma += $num;
        $mult *= $num;
    }
?>