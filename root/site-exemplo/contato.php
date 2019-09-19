<?php
    $tituloPagina = "Contato";
    //Diretivas de Inclusão: include, include_once, require, require_once
    include_once("inc/topo.php");

?>
            <h1>Contato</h1>

<form  action="contato_envia.php" method="post">
    <div>
    <label>Nome</label>
    <input type="text" id="Nome" name="Nome" />
        </div>
    <div>
    <label>Email</label>
    <input type="email" id="Email" name="Email" />
        </div>
    <div>
    <label>Telefone</label>
    <input type="tel" id="Telefone" name="Telefone" />
        </div><div>
    <label>Mensagem</label>
    <textarea id="Mensagem" name="Mensagem" rows="5" cols="50"></textarea>
</div>
    <div>
    <button type="submit">Enviar</button>
    </div>

</form>
<?php
    include_once("inc/rodape.php");
?>