<?php
    header("Content-type: text/html; charset=utf-8");
$numA = $_GET["numA"];
$numB = $_GET["numB"];

echo "Tabuada do $numA.";

for ($v = 0; $v <= $numB; $v++){
    
    $res = ($v * $numA);
    echo "<br />$numA x $v = $res" ;
    //Modo em 1 Linha
    //echo "<br />$numA x $v = " . ($v * $numA) ;
    
}

?>