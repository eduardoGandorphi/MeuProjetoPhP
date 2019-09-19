<?php 
    $tituloPagina = "Categoria do Portfolio";
    include_once("inc/topo.php");

    include_once(__DIR__ . "/dao/categorias.dao.php");
    
    $id = "";
    $titulo = "";
    $subTitulo = "Inclusão";
    //SE receber o ID via GET, busca o registro para Alteração
    // caso contrário, será Inclusão
    if (isset($_GET["id"]) && $_GET["id"] != "") {
        $subTitulo = "Alteração";
        $id = $_GET["id"];
        $categoriasDAO = new CategoriasDAO();
        $categoria = $categoriasDAO->BuscarPorId($id);
        $titulo = $categoria->Titulo;
    }

?>
<!-- Categoria do Portfolio - Início do código personalizado -->
<h1 class="h2">Categoria do Portfolio <small><?=$subTitulo?></small></h1>

<form action="categoria_acao.php" method="post">
    <input type="hidden" name="id" value="<?=$id?>"/>
    <div class="form-group">
        <label>Título</label>
        <input type="text" name="txtTitulo" id="txtTitulo" class="form-control" value="<?=$titulo?>" />
    </div>
    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary"><span data-feather="save"></span> Salvar</button>
    </div>
</form>

<!-- Categoria do Portfolio - Final do código personalizado -->
<?php
    include_once("inc/rodape.php");
?>