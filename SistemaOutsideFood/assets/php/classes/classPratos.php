<?php

require_once "database.php";

class Pratos{

	private $id;
	private $nome;
	private $preco;
	private $foto;
	

	public function __construct() {
		$database = new Database();
		$dbSet = $database->dbSet();
		$this->conn = $dbSet;
	}

	function setId($value){
		$this->id = $value;
	}

	function setNome($value){
		$this->nome = $value;
	}
	function setPreco($value){
		$this->preco = $value;
	}
	function setFoto($value){
		$this->foto = $value;
	}
	


	public function insert(){
		try{
			-- $stmt = $this->conn->prepare("INSERT INTO `pratos`(`nome`,`preco`,`foto`) VALUES (:nome, :preco, :foto)");
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":preco", $this->preco);			
			$stmt->bindParam(":foto", $this->foto);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function edit(){
		try{
			$stmt = $this->conn->prepare("UPDATE `pratos` SET `nome` = :nome, `preco` = :preco, `foto` = :foto  WHERE `id` = :id");
			$stmt->bindParam(":id", $this->id);
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":preco", $this->preco);
			$stmt->bindParam(":foto", $this->foto);			
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}
	
	public function delete(){
		try{
			$stmt = $this->conn->prepare("DELETE FROM `pratos` WHERE `id` = :id");
			$stmt->bindParam(":id", $this->id);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function view(){
		$stmt = $this->conn->prepare("SELECT * FROM `pratos` WHERE `id` = :id");
		$stmt->bindParam(":id", $this->id);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		return $row;
	}

	public function index(){
		$stmt = $this->conn->prepare("SELECT * FROM `pratos` WHERE 1 ORDER BY `nome`");
		$stmt->execute();
		return $stmt;
	}

	
}
?>