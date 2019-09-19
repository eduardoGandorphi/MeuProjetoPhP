<?php 
    include_once(__DIR__ . "/dao/empresas.dao.php");
    
    //Inclusão

    //Crio uma Instância da Model
    $empresa = new Empresa();

    $empresa->Titulo = $_POST["txtTitulo"];
    $empresa->Texto = $_POST["txtTexto"];
    //Crio a Instância da DAO
    $empresasDAO = new EmpresasDAO();
    
    //Verifico se o valor do ID veio do FORM = Alteração
    if (isset($_POST["id"]) && $_POST["id"] != "") {
        //Atribuo o ID recebido do Form no objeto $empresa
        $empresa->Id = $_POST["id"];
        //Invoco o Método de Alteração da DAO
        $sucesso = $empresasDAO->Alterar($empresa);
    } else { //Senão - Inclusão
        //Invoco o Método de Inserção da DAO
        $sucesso = $empresasDAO->Inserir($empresa);
    }

    if ($sucesso){
        //  header("location: empresa.php");
        exit();
    }

    echo "Ocorreu um Erro na Operação: " . $empresasDAO->Mensagem;
?>