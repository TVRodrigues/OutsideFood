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

	public function contador(){
        $query = "SELECT count(*) FROM `espacos` WHERE 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

        //A função abaixo conta a quantidade de cadastros na tabela de acordo com o nome
    public function contadorPesquisa($nome){
        $query = "SELECT count(*) FROM `espacos` WHERE `nome` LIKE '%" . $nome . "%'";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $nome);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    
    //A função abaixo define o inicio e fim da paginacao
    public function paginacao($limite, $offset){
        try {
            $query = "SELECT * FROM `espacos` WHERE 1 ORDER BY `nome` ASC LIMIT :limite OFFSET :offset";
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
            $query = "SELECT * FROM `espacos` WHERE `nome` LIKE :nome LIMIT :limite OFFSET :offset";
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