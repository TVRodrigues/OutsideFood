<?php

require_once "database.php";

class Eventos{

	private $id;
	private $nome;
	private $data;
	private $horario;
	private $organizador;
	private $foto;
	private $cidades_id;
	private $locais_id;

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
	function setData($value){
		$this->data = $value;
	}
	function setHorario($value){
		$this->horario = $value;
	}
	function setOrganizador($value){
		$this->organizador = $value;
	}
	function setFoto($value){
		$this->foto = $value;
	}
	function setCidade($value){
		$this->cidades_id = $value;
	}
	function setLocal($value){
		$this->locais_id = $value;
	}


	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO `eventos`(`nome`,`data`,`horario`,`organizador`,`foto`,`cidades_id`,`locais_id`) VALUES   (:nome, :data, :horario, :organizador, :foto,:cidades_id,:locais_id)");
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":data", $this->data);
			$stmt->bindParam(":horario", $this->horario);
			$stmt->bindParam(":organizador", $this->organizador);
			$stmt->bindParam(":foto", $this->foto);
			$stmt->bindParam(":cidades_id", $this->cidades_id);
			$stmt->bindParam(":locais_id", $this->locais_id);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function edit(){
		try{
			$stmt = $this->conn->prepare("UPDATE `eventos` SET `nome` = :nome, `data` = :data, `horario` = :horario, `organizador` = :organizador, `foto` = :foto WHERE `id` = :id");
			$stmt->bindParam(":id", $this->id);
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":data", $this->data);
			$stmt->bindParam(":horario", $this->horario);
			$stmt->bindParam(":organizador", $this->organizador);
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
			$stmt = $this->conn->prepare("DELETE FROM `eventos` WHERE `id` = :id");
			$stmt->bindParam(":id", $this->id);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function view(){
		$stmt = $this->conn->prepare("SELECT * FROM `eventos` WHERE `id` = :id");
		$stmt->bindParam(":id", $this->id);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		return $row;
	}

	public function index(){
		$stmt = $this->conn->prepare("SELECT * FROM `eventos` WHERE 1 ORDER BY `nome`");
		$stmt->execute();
		return $stmt;
	}

	
}
?>