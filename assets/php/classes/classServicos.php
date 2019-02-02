<?php

require_once 'Database.php';


	class Servicos{

		private $id;
		private $tipo;
		private $foto;
		private $salario;


		public function __construct(){
	        $database = new Database();
	        $this->conn = $database->dbSet();
    	}

		public function setId($value){
			$this->id = $value;
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


	

		public function insert(){
			try{
				$stmt = $this->conn->prepare("INSERT INTO `servicos` (`foto`,`tipo`, `salario`) VALUES (:foto, :tipo, :salario)");
				$stmt->bindParam(":foto", $this->foto);
				$stmt->bindParam(":tipo", $this->tipo);
				$stmt->bindParam(":salario", $this->salario);
				$stmt->execute();
				return 1;
			}catch(PDOException $e){
				echo $e->getMessage();
				return 0;
			}
		}
		public function edit(){
			try{
				$stmt = $this->conn->prepare("UPDATE `servicos` SET `foto` = :foto, `tipo` = :tipo, `salario` = :salario WHERE `id` = :id");
				$stmt->bindParam(":id", $this->id);
				$stmt->bindParam(":foto", $this->foto);	
				$stmt->bindParam(":tipo", $this->tipo);
				$stmt->bindParam(":salario", $this->salario);
				$stmt->execute();
				return 1;		
			}catch(PDOException $e){
				echo $e->getMessage();
				return 0;	
			}
		}
		public function delet(){
			$stmt = $this->conn->prepare("DELETE FROM `servicos` WHERE `id` = :id");
			$stmt->bindParam(":id", $this->id);
			$stmt->execute();
			return $this->id;
		}
		 public function index(){
	        $stmt = $this->conn->prepare("SELECT * FROM `servicos` WHERE 1");
	        $stmt->execute();
        return $stmt; 
    	}

	}


?>