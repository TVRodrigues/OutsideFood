<?php

require_once "database.php";

class Edicoes{

	private $id;
	private $numero;
	private $capacidade;
	private $lotacao;
	private $eventos_id;
	

	public function __construct() {
		$database = new Database();
		$dbSet = $database->dbSet();
		$this->conn = $dbSet;
	}

	function setId($value){
		$this->id = $value;
	}

	function setNumero($value){
		$this->numero = $value;
	}
	function setCapacidade($value){
		$this->capacidade = $value;
	}
	function setLotacao($value){
		$this->lotacao = $value;
	}
	function setEventos($value){
		$this->eventos_id = $value;
	}
	


	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO `edicoes`(`numero`,`capacidade`,`lotacao`,`eventos_id`) VALUES (:numero, :capacidade, :lotacao, :eventos_id)");
			$stmt->bindParam(":numero", $this->numero);
			$stmt->bindParam(":capacidade", $this->capacidade);
			$stmt->bindParam(":lotacao", $this->lotacao);
			$stmt->bindParam(":eventos_id", $this->eventos_id);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function edit(){
		try{
			$stmt = $this->conn->prepare("UPDATE `edicoes` SET `numero` = :numero, `capacidade` = :capacidade, `lotacao` = :lotacao, `eventos_id` = :eventos_id WHERE `id` = :id");
			$stmt->bindParam(":id", $this->id);
			$stmt->bindParam(":numero", $this->numero);
			$stmt->bindParam(":capacidade", $this->capacidade);
			$stmt->bindParam(":lotacao", $this->lotacao);	
			$stmt->bindParam(":eventos_id", $this->eventos_id);	
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}
	
	public function delete(){
		try{
			$stmt = $this->conn->prepare("DELETE FROM `edicoes` WHERE `id` = :id");
			$stmt->bindParam(":id", $this->id);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function view(){
		$stmt = $this->conn->prepare("SELECT * FROM `edicoes` WHERE `id` = :id");
		$stmt->bindParam(":id", $this->id);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		return $row;
	}

	public function index(){
		$stmt = $this->conn->prepare("SELECT * FROM `edicoes` WHERE 1 ORDER BY `nome`");
		$stmt->execute();
		return $stmt;
	}
	
}
?>