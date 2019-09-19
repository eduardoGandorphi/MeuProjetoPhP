<?php //contatos.dao.php

    require_once(__DIR__ . "/../inc/conexao.php");
    require_once(__DIR__ . "/../model/empresa.model.php");

    class EmpresasDAO extends Conexao {
        public $Mensagem;
        //Método para Inserir Registro
        public function Inserir ($empresa){
            
            $sql = "INSERT INTO empresa (titulo,texto) 
                        VALUES (?,?) ";
            
            $parametros = array($empresa->Titulo,$empresa->Texto);
            
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
        public function Alterar ($empresa) {
             $sql = "UPDATE empresa 
                        SET titulo = ?, texto = ?
                        WHERE id = ? ";
            
            $parametros = array($empresa->Titulo,$empresa->Texto,$empresa->Id);
            
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
            $sql = "SELECT * FROM empresa";
            $retorno = array();
            try {
                $comando = $this->prepare($sql);
                $resultado = $comando->execute();
                $registros = $comando->fetchAll(PDO::FETCH_ASSOC);
                foreach($registros as &$reg){
                    $item = new Empresa();
                    $item->Id = $reg["id"];
                    $item->Titulo = $reg["titulo"];
                    $item->Texto = $reg["texto"];
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
            $sql = "SELECT * FROM categoria WHERE id = ?";
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
                    $retorno = new Empresa();
                    $retorno->Id = $reg["id"];
                    $retorno->Titulo = $reg["titulo"];
                    $retorno->Texto = $reg["texto"];
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
    }


?>