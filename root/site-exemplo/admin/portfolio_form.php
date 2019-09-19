<?php 
    $tituloPagina = "Portfolio";
    include_once("inc/topo.php");

    include_once(__DIR__ . "/dao/portfolios.dao.php");
    include_once(__DIR__ . "/dao/categorias.dao.php");

    $categoriasDAO = new CategoriasDAO();
    
    $id = "";
    $idCategoria = "";
    $titulo = "";
    $imagem = "";
    $descricao = "";
    $url = "";
    $subTitulo = "Inclusão";
    //SE receber o ID via GET, busca o registro para Alteração
    // caso contrário, será Inclusão
    if (isset($_GET["id"]) && $_GET["id"] != "") {
        $subTitulo = "Alteração";
        $id = $_GET["id"];
        $portfoliosDAO = new PortfoliosDAO();
        $portfolio = $portfoliosDAO->BuscarPorId($id);
        $titulo = $portfolio->Titulo;
        $imagem = $portfolio->Imagem;
        $descricao = $portfolio->Descricao;
        $idCategoria = $portfolio->Id_Categoria;
        $url = $portfolio->URL;
    }
?>
<!-- Portfolio - Início do código personalizado -->
<h1 class="h2">Portfolio <small><?=$subTitulo?></small></h1>

<form method="post" action="portfolio_acao.php">
    <input type="hidden" name="id" value="<?=$id?>" />
    <div class="form-group">
        <label>Título</label>
        <input type="text" name="txtTitulo" id="txtTitulo" class="form-control" value="<?=$titulo?>" />
    </div>
    <div class="form-group">
        <label>Categoria</label>
        <select name="ddlIdCategoria" id="ddlIdCategoria" class="form-control">
            <option value="">Selecione uma Categoria</option>
            <?php 
            $categorias = $categoriasDAO->ListarTudo();
    
            foreach($categorias as $cat) {                
                
            ?>
            <option value="<?=$cat->Id?>" <?=
                ($idCategoria==$cat->Id)?"selected=\"selected\"":""?>><?=
                $cat->Titulo?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label>Imagem</label>
        <input type="file" name="arqImagem" id="arqImagem" class="form-control" value="<?=$imagem?>" />
    </div>
    <div class="form-group">
        <label>Descrição</label>
        <textarea rows="5" name="txtDescricao" id="txtDescricao" class="form-control"><?=$descricao?></textarea>
    </div>
    <div class="form-group">
        <label>Link</label>
        <input type="url" name="txtLinkExterno" id="txtLinkExterno" class="form-control" value="<?=$url?>" />
    </div>
    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary"><span data-feather="save"></span> Salvar</button>
    </div>
</form>

<!-- Portfolio - Final do código personalizado -->
<?php
    include_once("inc/rodape.php");
?>