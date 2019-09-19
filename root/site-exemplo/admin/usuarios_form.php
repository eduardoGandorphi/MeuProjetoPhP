<?php 
    $tituloPagina = "Usuários";
    include_once("inc/topo.php");

    include_once(__DIR__ . "/dao/usuarios.dao.php");
    
    $id = "";
    $nome = "";
    $email = "";
    $senha = "";
    
    $subTitulo = "Inclusão";
    //SE receber o ID via GET, busca o registro para Alteração
    // caso contrário, será Inclusão
    if (isset($_GET["id"]) && $_GET["id"] != "") {
        $subTitulo = "Alteração";
        $id = $_GET["id"];
        $usuariosDAO = new UsuariosDAO();
        $usuario = $usuariosDAO->BuscarPorId($id);
        $nome = $usuario->Nome;
        $email = $usuario->Email;
        $senha = $usuario->Senha;        
    }
?>
<!-- Usuários - Início do código personalizado -->
<h1 class="h2">Usuários <small><?=$subTitulo?></small></h1>

<form action="usuarios_acao.php" method="post">
    <input type="hidden" name="id" value="<?=$id?>" />
    <div class="form-group">
        <label>Nome</label>
        <input type="text" name="txtNome" id="txtNome" class="form-control" value="<?=$nome?>" />
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="txtEmail" id="txtEmail" class="form-control" value="<?=$email?>" />
    </div>
    <div class="form-group">
        <label>Senha</label>
        <input type="password" name="txtSenha" id="txtSenha" class="form-control" value="<?=$senha?>" />        
    </div>
    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary"><span data-feather="save"></span> Salvar</button>
    </div>
</form>

<!-- Portfolio - Final do código personalizado -->
<?php
    include_once("inc/rodape.php");
?>