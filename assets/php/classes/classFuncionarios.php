<?php

require_once "database.php";

class Funcionarios{

	private $id;
	private $nome;
	private $tipo;
	private $servicos_id;

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

	function setTipo($value){
        $this->tipo = $value;
    }

    function setServicos($value){
        $this->servicos_id = $value;
    }



	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO `funcionarios`(`nome`,`tipo`,`servicos_id`) VALUES (:nome, :tipo, :servicos_id)");
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":tipo", $this->tipo);
			$stmt->bindParam(":servicos_id", $this->servicos_id);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function edit(){
		try{
			$stmt = $this->conn->prepare("UPDATE `funcionarios` SET `nome` = :nome, `tipo` = :tipo, `servicos_id` = :servicos_id WHERE `id` = :id");
			$stmt->bindParam(":id", $this->id);
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":tipo", $this->tipo);
			$stmt->bindParam(":servicos_id", $this->servicos_id); 
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}
	
	public function delete(){
		try{
			$stmt = $this->conn->prepare("DELETE FROM `funcionarios` WHERE `id` = :id");
			$stmt->bindParam(":id", $this->id);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function view(){
		$stmt = $this->conn->prepare("SELECT * FROM `funcionarios` WHERE `id` = :id");
		$stmt->bindParam(":id", $this->id);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		return $row;
	}

	public function index(){
		$stmt = $this->conn->prepare("SELECT * FROM `funcionarios` WHERE 1 ORDER BY `nome`");
		$stmt->execute();
		return $stmt;
	}

	
}
?>