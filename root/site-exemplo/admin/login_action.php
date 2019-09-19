<?php
    include_once(__DIR__ . "/dao/usuarios.dao.php");
    $usuario_dao = new UsuariosDAO();
    $email = $_POST["Email"];
    $senha = $_POST["Senha"];
    
    $Usu = $usuario_dao->BuscarObjPorUsuarioSenha($email,$senha);
    echo "<br>sucesso:";
    var_dump($Usu);

    if($Usu != null) 
    {      
        session_start();
        $_SESSION["Usuario"] = $_POST["Email"];        
        $_SESSION["Nome"] = $Usu->Nome;       
        
        
        echo $_SESSION["Nome"];
        header("location: index.php");
        exit();
    }
    header("location: login.php?erro=Credenciais incorretas!");
    
?>