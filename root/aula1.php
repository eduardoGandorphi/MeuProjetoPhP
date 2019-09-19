<?php
    //Define um Cabeçalho HTTP para o arquivo PHP
    // para que o Browser entenda que ele será um 
    // arquivo de texto com html e com codificação
    // UTF-8 (conjunto de caracteres multilingual)
    header("Content-type: text/html; charset=utf-8");

    //echo = Comando em PHP para escrever informações
    //       para o usuario
    echo("Olá, este é o meu primeiro arquivo PHP.<br/>");
    echo("Seja Bem Vindo!!<br/>");
    echo($_GET["nome"]);

?>