<?php

require_once "database.php";

class Locais{

	private $id;
	private $nome;
	private $cidades_id;

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

	function setCidades($value){
		$this->cidades_id = $value;
	}


	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO `locais`(`nome`, `cidades_id`) VALUES (:nome, :cidades_id)");
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":cidades_id", $this->cidades_id);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function edit(){
		try{
			$stmt = $this->conn->prepare("UPDATE `locais` SET `nome` = :nome, `cidades_id` = :cidades_id WHERE `id` = :id");
			$stmt->bindParam(":id", $this->id);
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":cidades_id", $this->cidades_id);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}
	
	public function delete(){
		try{
			$stmt = $this->conn->prepare("DELETE FROM `locais` WHERE `id` = :id");
			$stmt->bindParam(":id", $this->id);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function view(){
		$stmt = $this->conn->prepare("SELECT * FROM `locais` WHERE `id` = :id");
		$stmt->bindParam(":id", $this->id);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		return $row;
	}

	public function index(){
		$stmt = $this->conn->prepare("SELECT * FROM `locais` WHERE 1 ORDER BY `nome`");
		$stmt->execute();
		return $stmt;
	}

	public function contador(){
        $query = "SELECT count(*) FROM `locais` WHERE 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

        //A função abaixo conta a quantidade de cadastros na tabela de acordo com o nomelocais
    public function contadorPesquisa($nome){
        $query = "SELECT count(*) FROM `locais` WHERE `nome` LIKE '%" . $nome . "%'";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $nome);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    
    //A função abaixo define o inicio e fim da paginacao
    public function paginacao($limite, $offset){
        try {
            $query = "SELECT * FROM `locais` WHERE 1 ORDER BY `nome` ASC LIMIT :limite OFFSET :offset";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


     //A função abaixo define o inicio e fim da paginacao de acordo com o nome
    public function paginacaoPesquisa($nome, $limite, $offset){
        try {
            $query = "SELECT * FROM `locais` WHERE `nome` LIKE :nome LIMIT :limite OFFSET :offset";
            $stmt = $this->conn->prepare($query);
            $nome = '%' . $nome . '%';
            $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
            $stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

	
}
?>