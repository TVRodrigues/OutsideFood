<?php

require_once "database.php";

class Albuns{

	private $id;
	private $nome;
	private $foto;
	private $eventos_id;

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

	function setFoto($value){
		$this->foto = $value;
	}

	function setEvento($value){
		$this->eventos_id = $value;
	}

	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO `albuns`(`foto`,`eventos_id`) VALUES (:foto, :eventos_id)");
			//$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":foto", $this->foto);
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
			$stmt = $this->conn->prepare("UPDATE `albuns` SET `foto` = :foto WHERE `id` = :id");
			$stmt->bindParam(":id", $this->id);
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
			$stmt = $this->conn->prepare("DELETE FROM `albuns` WHERE `id` = :id");
			$stmt->bindParam(":id", $this->id);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function view(){
		$stmt = $this->conn->prepare("SELECT * FROM `albuns` WHERE `id` = :id");
		$stmt->bindParam(":id", $this->id);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		return $row;
	}

	public function index(){
		$stmt = $this->conn->prepare("SELECT * FROM `albuns` WHERE 1 ORDER BY `foto`");
		$stmt->execute();
		return $stmt;
	}

	public function contador(){
        $query = "SELECT count(*) FROM `albuns` WHERE 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

        //A função abaixo conta a quantidade de cadastros na tabela de acordo com o foto
    public function contadorPesquisa($foto){
        $query = "SELECT count(*) FROM `albuns` WHERE `foto` = :foto";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":foto", $foto);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    
    //A função abaixo define o inicio e fim da paginacao
    public function paginacao($limite, $offset){
        try {
            $query = "SELECT * FROM `albuns` WHERE 1 ORDER BY `foto` ASC LIMIT :limite OFFSET :offset";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


     //A função abaixo define o inicio e fim da paginacao de acordo com o foto
    public function paginacaoPesquisa($foto, $limite, $offset){
        try {
            $query = "SELECT * FROM `albuns` WHERE `foto` = :foto LIMIT :limite OFFSET :offset";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":foto", $foto, PDO::PARAM_STR);
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