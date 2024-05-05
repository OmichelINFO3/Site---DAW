<?php
	include_once "produto.class.php";
	class ProdutoSDAO{
		public function __construct(){
			$this->conexao = 
			new PDO("mysql:host=localhost; dbname=BANCOsd", 
			"root", "");
		}
		
		
		public function inserir(Produto $produto){
			$sql= $this->conexao->prepare(
			"INSERT INTO produto (valor, nome_produto, id_categoria_id, foto, descricao, disponibilidade) VALUES 
			(:preco, :nome, :idcategorias, :foto, :descricao, :disponibilidade)");
			$sql->bindValue(":preco", $produto->getValor());
			$sql->bindValue(":nome", $produto->getNomeProduto());
			$sql->bindValue(":idcategorias", $produto->getIdCategoriaId());
			$sql->bindValue(":foto", $produto->getFoto());
			$sql->bindValue(":descricao", $produto->getDescricao());
			$sql->bindValue(":disponibilidade", $produto->getDisponibilidade());
			return $sql->execute();
		}
		
		public function listar(){
			$sql= $this->conexao->prepare(
			"select * from produto");
			$sql->execute();
			return $sql->fetchAll();
		}
	
	}
?>