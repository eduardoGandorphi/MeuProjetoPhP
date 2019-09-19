<?php //contatos.dao.php

    require_once(__DIR__ . "/../inc/conexao.php");
    require_once(__DIR__ . "/../model/usuario.model.php");

    class UsuariosDAO extends Conexao {
        public $Mensagem;
        //Método para Inserir Registro
        public function Inserir ($usuario){
            
            $sql = "INSERT INTO usuario (nome,email,senha) 
                        VALUES (?,?,?) ";
            
            $parametros = array($usuario->Nome, $usuario->Email, $usuario->Senha);
            
            try {
                $comando = $this->prepare($sql);
                $comando->execute($parametros);
                return true;
            } 
            catch (PDOException $ex)
            {
                $this->Mensagem = "Erro ao Inserir: " . $ex->getMessage();
                return false;   
            }
        }
        //Método para Alterar Registro
        public function Alterar ($usuario) {
             $sql = "UPDATE usuario 
                        SET nome = ?,
                            email = ?,
                            senha = ?
                        WHERE id = ? ";
            
            $parametros = array($usuario->Nome,$usuario->Email,$usuario->Senha,$usuario->Id);
            
            try {
                $comando = $this->prepare($sql);
                $comando->execute($parametros);
                return true;
            } 
            catch (PDOException $ex)
            {
                $this->Mensagem = "Erro ao Alterar: " . $ex->getMessage();
                return false;   
            }
        }
        //Método para Listar todos Registros
        public function ListarTudo(){
            $sql = "SELECT * FROM usuario";
            $retorno = array();
            try {
                $comando = $this->prepare($sql);
                $resultado = $comando->execute();
                $registros = $comando->fetchAll(PDO::FETCH_ASSOC);
                foreach($registros as &$reg){
                    $item = new Usuario();
                    $item->Id = $reg["id"];
                    $item->Nome = $reg["nome"];
                    $item->Email = $reg["email"];
                    $item->Senha = $reg["senha"];
                    $retorno[]=$item;
                }
            } 
            catch (PDOException $ex)
            {
                $this->Mensagem = "Erro ao Listar: " . $ex->getMessage();
            }
            return $retorno;
            
        }
        
    
        //Método para Pesquisar por um Registro específico
        public function BuscarPorId($id){
            $sql = "SELECT * FROM usuario WHERE id = ?";
            $parametro = array($id);
            $retorno = null;
            try {
                $comando = $this->prepare($sql);
                $resultado = $comando->execute($parametro);
                $registros = $comando->fetchAll(PDO::FETCH_ASSOC);
                
                if (count($registros) > 0){
                    //Aloco o primeiro registro para preencher a Model
                    $reg = $registros[0];
                    //Instancio e Preencho a Model
                    $retorno = new Usuario();
                    $retorno->Id = $reg["id"];
                    $retorno->Nome = $reg["nome"];
                    $retorno->Email = $reg["email"];
                    $retorno->Senha = $reg["senha"];                    
                }
            } 
            catch (PDOException $ex)
            {
                $this->Mensagem = "Erro ao Listar: " . $ex->getMessage();
            }
            return $retorno; 
        }
        
        //Método para Excluir um Registro específico
        public function Excluir($id){
            
        }
        
        
 //Método para Autenticar um usuario
         public function Autenticar($usuario, $senha)
        {
            $sql = "SELECT id FROM usuario WHERE email = ? and senha = ?";
            $parametro = array($usuario,$senha);            
             
            try {
                echo "<br>usuario:";
                var_dump($usuario);
                echo "<br>senha:";
                var_dump($senha);
                $comando = $this->prepare($sql);
                $resultado = $comando->execute($parametro);
                $registros = $comando->fetchAll(PDO::FETCH_ASSOC);
                
                echo "<br>resultado:";
                var_dump($resultado);
                echo "<br>registros:";
                var_dump($registros);
                
                return (count($registros) > 0);
            } 
            catch (PDOException $ex)
            {
                $this->Mensagem = "Erro ao Listar: " . $ex->getMessage();
                return false; 
            }  
        }
        
        public function BuscarObjPorUsuarioSenha($usuario, $senha)
        {
            $sql = "SELECT id,nome,email,senha FROM usuario WHERE email = ? and senha = ?";
            $parametro = array($usuario,$senha);            
            $objUsuario = null;
            try {
                echo "<br>usuario:";
                var_dump($usuario);
                echo "<br>senha:";
                var_dump($senha);
                $comando = $this->prepare($sql);
                $resultado = $comando->execute($parametro);
                $registros = $comando->fetchAll(PDO::FETCH_ASSOC);
                
                echo "<br>resultado:";
                var_dump($resultado);
                echo "<br>registros:";
                var_dump($registros);
                
                foreach($registros as &$reg){
                    $objUsuario = new Usuario();
                 
                    $objUsuario->Id = $reg["id"];
                    $objUsuario->Nome = $reg["nome"];
                    $objUsuario->Email = $reg["email"];
                    $objUsuario->Senha = $reg["senha"];    
                    
                    return $objUsuario; 
                }                
            } 
            catch (PDOException $ex)
            {
                $this->Mensagem = "Erro ao Listar: " . $ex->getMessage();
                return $objUsuario; 
            }  
        }
        
    }

       
     


?>