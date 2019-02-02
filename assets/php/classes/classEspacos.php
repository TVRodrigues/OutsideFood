<?php

require_once "database.php";

class Espacos{

	private $id;
	private $nome;
	private $aluguel;
	private $metragem;
	private $benfeitoria;
	

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
	function setAluguel($value){
		$this->aluguel = $value;
	}
	function setMetragem($value){
		$this->metragem = $value;
	}
	function setBenfeitoria($value){
		$this->benfeitoria = $value;
	}
	


	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO `espacos`(`nome`,`aluguel`,`metragem`,`benfeitoria`) VALUES (:nome, :aluguel, :metragem, :benfeitoria)");
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":aluguel", $this->aluguel);
			$stmt->bindParam(":metragem", $this->metragem);
			$stmt->bindParam(":benfeitoria", $this->benfeitoria);
			
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function edit(){
		try{
			$stmt = $this->conn->prepare("UPDATE `espacos` SET `nome` = :nome, `aluguel` = :aluguel, `metragem` = :metragem, `benfeitoria` = :benfeitoria  WHERE `id` = :id");
			$stmt->bindParam(":id", $this->id);
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":aluguel", $this->aluguel);
			$stmt->bindParam(":metragem", $this->metragem);
			$stmt->bindParam(":benfeitoria", $this->benfeitoria);		
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}
	
	public function delete(){
		try{
			$stmt = $this->conn->prepare("DELETE FROM `espacos` WHERE `id` = :id");
			$stmt->bindParam(":id", $this->id);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function view(){
		$stmt = $this->conn->prepare("SELECT * FROM `espacos` WHERE `id` = :id");
		$stmt->bindParam(":id", $this->id);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		return $row;
	}

	public function index(){
		$stmt = $this->conn->prepare("SELECT * FROM `espacos` WHERE 1 ORDER BY `nome`");
		$stmt->execute();
		return $stmt;
	}

	
}
?>