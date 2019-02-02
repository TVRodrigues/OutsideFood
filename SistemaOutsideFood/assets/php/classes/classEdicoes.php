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
			$stmt = $this->conn->prepare("UPDATE `edicoes` SET `numero` = :numero, `capacidade` = :capacidade, `lotacao` = :lotacao WHERE `id` = :id");
			$stmt->bindParam(":id", $this->id);
			$stmt->bindParam(":numero", $this->numero);
			$stmt->bindParam(":capacidade", $this->capacidade);
			$stmt->bindParam(":lotacao", $this->lotacao);		
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
		$stmt = $this->conn->prepare("SELECT * FROM `edicoes` WHERE 1");
		$stmt->execute();
		return $stmt;
	}

	public function contador(){
        $query = "SELECT count(*) FROM `edicoes` WHERE 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

        //A função abaixo conta a quantidade de cadastros na tabela de acordo com o nome
   	public function contadorPesquisa($nome){
        $stmt = $this->conn->prepare("SELECT count(*) FROM edicoes WHERE eventos_id IN (SELECT id FROM eventos WHERE nome = '%" . $nome . "%');");
        $stmt->bindParam(":nome", $nome);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    
    //A função abaixo define o inicio e fim da paginacao
    public function paginacao($limite, $offset){
        try {
            $query = "SELECT * FROM `edicoes` WHERE 1 ORDER BY `id` ASC LIMIT :limite OFFSET :offset";
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
            $query = "SELECT count(*) FROM edicoes WHERE eventos_id IN (SELECT id FROM eventos WHERE nome LIKE :nome) LIMIT :limite OFFSET :offset";

             
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