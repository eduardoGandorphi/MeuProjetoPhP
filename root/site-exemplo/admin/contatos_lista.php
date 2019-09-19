<?php 
    $tituloPagina = "Contatos";
    include_once("inc/topo.php");

    include_once(__DIR__ . "/dao/contatos.dao.php");
?>
<!-- Contatos - Início do código personalizado -->
<h1 class="h2">Contatos</h1>

<table class="table table-striped table-sm">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        //Instancializa a DAO
        $contatosDAO = new ContatosDAO();
        //Chama o Método de Listagem e armazena o resultado em $contatos
        $contatos = $contatosDAO->ListarTudo();
        //Varre os elementos do Vetor, e exibe-os na listagem
        
        foreach($contatos as $cont) { //< fecha mais abaixo
        ?>
        <tr>
            <td><?=$cont->Id?></td>
            <td><?=$cont->Nome?></td>
            <td><a href="mailto:<?=$cont->Email?>"><?=$cont->Email?></a></td>
            <td><?=$cont->Telefone?></td>
        </tr>
        <?php
        } //Fim do foreach
        ?>
    </tbody>
</table>
<?php

    include_once("inc/rodape.php");

?>