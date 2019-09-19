<?php //contatos.dao.php

    require_once(__DIR__ . "/../inc/conexao.php");
    require_once(__DIR__ . "/../model/usuario.model.php");

    class PorfoliosDAO extends Conexao {
        public $Mensagem;
        //Método para Inserir Registro
        public function Inserir ($portfolio){
            
            $sql = "INSERT INTO portfolio (titulo,descricao,imagem,url,id_categoria) 
                        VALUES (?,?,?,?,?) ";
            
            $parametros = array($portfolio->Titulo, $portfolio->Descricao, 
                                $portfolio->Imagem,$portfolio->URL,$portfolio->Id_Categoria);
            
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
        public function Alterar ($portfolio) {
             $sql = "UPDATE portfolio 
                        SET titulo = ?,
                            descricao = ?,
                            imagem = ?,
                            url = ?,
                            id_categoria = ?
                        WHERE id = ? ";
            
            $parametros = array($portfolio->Titulo, $portfolio->Descricao, 
                                $portfolio->Imagem,$portfolio->URL,$portfolio->Id_Categoria, $portfolio->Id);
            
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
            $sql = "SELECT * FROM portfolio";
            $retorno = array();
            try {
                $comando = $this->prepare($sql);
                $resultado = $comando->execute();
                $registros = $comando->fetchAll(PDO::FETCH_ASSOC);
                foreach($registros as &$reg){
                    $item = new Portfolio();
                    $item->Id = $reg["id"];
                    $item->Titulo = $reg["titulo"];
                    $item->Descricao = $reg["descricao"];
                    $item->Imagem = $reg["imagem"];
                    $item->URL = $reg["url"];
                    $item->Id_Categoria = $reg["id_categoria"];
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
            $sql = "SELECT * FROM portfolio WHERE id = ?";
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
                    $retorno = new Portfolio();
                    $item->Titulo = $reg["titulo"];
                    $item->Descricao = $reg["descricao"];
                    $item->Imagem = $reg["imagem"];
                    $item->URL = $reg["url"];
                    $item->Id_Categoria = $reg["id_categoria"];                  
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