<?php

require_once "database.php";

class Culinaria{

	private $id;
	private $tipo_culinaria;
	private $tempo;
	
	

	public function __construct() {
		$database = new Database();
		$dbSet = $database->dbSet();
		$this->conn = $dbSet;
	}

	function setId($value){
		$this->id = $value;
	}

	function setTipo_culinaria($value){
		$this->tipo_culinaria = $value;
	}
	function setTempo($value){
		$this->tempo = $value;
	}
	
	


	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO `culinaria`(`tipo_culinaria`,`tempo`) VALUES (:tipo_culinaria, :tempo)");
			$stmt->bindParam(":tipo_culinaria", $this->tipo_culinaria);
			$stmt->bindParam(":tempo", $this->tempo);				
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function edit(){
		try{
			$stmt = $this->conn->prepare("UPDATE `culinaria` SET `tipo_culinaria` = :tipo_culinaria, `tempo` = :tempo  WHERE `id` = :id");
			$stmt->bindParam(":id", $this->id);
			$stmt->bindParam(":tipo_culinaria", $this->tipo_culinaria);
			$stmt->bindParam(":tempo", $this->tempo);				
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}
	
	public function delete(){
		try{
			$stmt = $this->conn->prepare("DELETE FROM `culinaria` WHERE `id` = :id");
			$stmt->bindParam(":id", $this->id);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function view(){
		$stmt = $this->conn->prepare("SELECT * FROM `culinaria` WHERE `id` = :id");
		$stmt->bindParam(":id", $this->id);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		return $row;
	}

	public function index(){
		$stmt = $this->conn->prepare("SELECT * FROM `culinaria` WHERE 1 ORDER BY `tipo_culinaria`");
		$stmt->execute();
		return $stmt;
	}

	
}
?>