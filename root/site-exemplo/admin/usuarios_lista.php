<?php 
    $tituloPagina = "Usuários";
    include_once("inc/topo.php");

    include_once(__DIR__ . "/dao/usuarios.dao.php");
?>
<!-- Usuários - Início do código personalizado -->
<h1 class="h2">Usuários</h1>

<div>
<a href="usuarios_form.php" class="btn btn-primary">
    <span data-feather="plus-circle"></span>
    Incluir</a>
</div>
<table class="table table-striped table-sm">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $usuariosDAO = new UsuariosDAO();
            $usuarios = $usuariosDAO->ListarTudo();
            foreach($usuarios as $usu) {
        ?>
        <tr>
            <td><?=$usu->Nome?></td>
            <td><?=$usu->Email?></td>
            <td><a href="usuarios_form.php?id=<?=$usu->Id?>" class="btn btn-primary">Alterar</a></td>
        </tr>
        <?php }
        ?>
    </tbody>
</table>


<!-- Portfolio - Final do código personalizado -->
<?php
    include_once("inc/rodape.php");
?>