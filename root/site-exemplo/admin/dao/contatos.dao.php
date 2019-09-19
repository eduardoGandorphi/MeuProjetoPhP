<?php //contatos.dao.php

    require_once(__DIR__ . "/../inc/conexao.php");
    require_once(__DIR__ . "/../model/contato.model.php");

    class ContatosDAO extends Conexao {
        public $Mensagem;
        //Método para Inserir Registro
        public function Inserir ($contato){
            
            $sql = "INSERT INTO contatos (nome, email, telefone, mensagem) 
                        VALUES (?,?,?,?) ";
            
            $parametros = array($contato->Nome, $contato->Email, $contato->Telefone, $contato->Mensagem);
            
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
        public function Alterar ($contato) {
            
        }
        //Método para Listar todos Registros
        public function ListarTudo(){
            $sql = "SELECT * FROM contatos";
            $retorno = array();
            try {
                $comando = $this->prepare($sql);
                $resultado = $comando->execute();
                $registros = $comando->fetchAll(PDO::FETCH_ASSOC);
                foreach($registros as &$reg){
                    $item = new Contato();
                    $item->Id = $reg["id"];
                    $item->Nome = $reg["nome"];
                    $item->Telefone = $reg["telefone"];
                    $item->Email = $reg["email"];
                    $item->Mensagem = $reg["mensagem"];
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
            
        }
        //Método para Excluir um Registro específico
        public function Excluir($id){
            
        }
    }


?>