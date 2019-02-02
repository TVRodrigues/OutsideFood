<?php

require_once 'Database.php';


class Servicos{

	private $id;
	private $nome;
	private $tipo;
	private $salario;
	private $foto;
	private $espacos_id;

	public function __construct(){
		$database = new Database();
		$this->conn = $database->dbSet();
	}

	public function setId($value){
		$this->id = $value;
	}

	public function setNome($value){
		$this->nome = $value;
	}

	public function setFoto($value){
		$this->foto = $value;
	}

	public function setTipo($value){
		$this->tipo = $value;
	}

	public function setSalario($value){
		$this->salario = $value;
	}

	public function setEspaco($value){
		$this->espacos_id = $value;
	}
	

	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO `servicos` (`nome`,`tipo`,`salario`, `foto`, `espacos_id`) VALUES (:nome, :tipo, :salario, :foto, :espacos_id)");
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":tipo", $this->tipo);
			$stmt->bindParam(":salario", $this->salario);
			$stmt->bindParam(":foto", $this->foto);
			$stmt->bindParam(":espacos_id", $this->espacos_id);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}
	public function edit(){
		try{
			$stmt = $this->conn->prepare("UPDATE `servicos` SET `nome` = :nome, `tipo` = :tipo, `foto` = :foto, `salario` = :salario WHERE `id` = :id");
			$stmt->bindParam(":id", $this->id);
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":tipo", $this->tipo);
			$stmt->bindParam(":foto", $this->foto);	
			$stmt->bindParam(":salario", $this->salario);
			$stmt->execute();
			return 1;		
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;	
		}
	}

	public function edit2(){
		try{
			$stmt = $this->conn->prepare("UPDATE `servicos` SET `nome` = :nome, `tipo` = :tipo, `salario` = :salario WHERE `id` = :id");
			$stmt->bindParam(":id", $this->id);
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":tipo", $this->tipo);
			$stmt->bindParam(":salario", $this->salario);
			$stmt->execute();
			return 1;		
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;	
		}
	}
	public function delete(){
		try{
			$stmt = $this->conn->prepare("DELETE FROM `servicos` WHERE `id` = :id");
			$stmt->bindParam(":id", $this->id);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;	
		}
	}

	public function view(){
		$stmt = $this->conn->prepare("SELECT * FROM `servicos` WHERE `id` = :id");
		$stmt->bindParam(":id", $this->id);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		return $row;
	}

	public function index(){
		$stmt = $this->conn->prepare("SELECT * FROM `servicos` WHERE 1");
		$stmt->execute();
		return $stmt; 
	}

}


?>