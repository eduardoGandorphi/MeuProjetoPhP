<?php
    $num1 = $_GET["num1"];
    $num2 = $_GET["num2"];

    $soma = 0;

    for($v = $num1+1; $v < $num2; $v++){
        //Expressão Ternária = IF em linha
        $soma += ($v % 2 ==0? $v : 0);
        //OU
        if ($v % 2 == 0){
            $soma += $v;
        }
    }
    echo "A Soma dos valores pares entre $num1 e $num2 é: $soma";
?>