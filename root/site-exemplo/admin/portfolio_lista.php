<?php 
    $tituloPagina = "Portfolio";
    include_once("inc/topo.php");
    include_once(__DIR__ . "/dao/portfolios.dao.php");
?>
<!-- Portfolio - Início do código personalizado -->
<h1 class="h2">Portfolio</h1>

<div>
<a href="portfolio_form.php" class="btn btn-primary">
    <span data-feather="plus-circle"></span>
    Incluir</a>
</div>
<table class="table table-striped table-sm">
    <thead>
        <tr>
            <th>Título</th>
            <th>Imagem</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $portfoliosDAO = new PortfoliosDAO();
        $portfolios = $portfoliosDAO->ListarTudo();
        
        foreach($portfolios as $port) {
        ?>
        <tr>
            <td><?=$port->Titulo?></td>
            <td><img src="img/portfolio/<?=$port->Imagem?>" /> </td>
            <td><a href="portfolio_form.php?id=<?=$id?>">Alterar</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>


<!-- Portfolio - Final do código personalizado -->
<?php
    include_once("inc/rodape.php");
?>