<?php

require_once 'database.php';

class Vendas
{
     
    private $id;
    private $quantidade;
    private $servicos_id;


    public function __construct() {        
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;
    }

    public function setId($value){
        $this->id = $value;
    }

    public function setQuantidade($value){
        $this->quantidade = $value;
    }

    public function setServicos($value){
        $this->servicos_id = $value;
    }

    public function insert(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO `vendas`(`quantidade`,`servicos_id`) VALUES (:quantidade, :servicos_id)");
            $stmt->bindParam(":quantidade", $this->quantidade);
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
            $stmt = $this->conn->prepare("UPDATE `vendas` SET `quantidade` = :quantidade, `servicos_id` = :servicos_id WHERE `id` = :id");
            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":quantidade", $this->quantidade);
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
            $stmt = $this->conn->prepare("DELETE FROM `vendas` WHERE `id` = :id");
            $stmt->bindParam(":id", $this->id);
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            echo $e->getMessage();
            return 0;
        }
    }

    public function view(){
        $stmt = $this->conn->prepare("SELECT * FROM `vendas` WHERE `id` = :id");
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }

    public function index(){
        $stmt = $this->conn->prepare("SELECT * FROM `vendas` WHERE 1");
        $stmt->execute();
        return $stmt;
    }
    
}
?>

    