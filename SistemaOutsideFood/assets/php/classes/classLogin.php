<?php 
require_once 'database.php';

class Login{
     
    private $id;
    private $email;
    private $senha;
    private $tipo;

    public function __construct() {        
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;
    }
    public function setId($value){
        $this->id = $value;
    }
    public function setEmail($value){
        $this->email = $value;
    }
    public function setSenha($value){
        $this->senha = $value;
    }
    public function setTipo($value){
        $this->tipo = $value;
    }
     
    public function view(){
        $stmt = $this->conn->prepare("SELECT * FROM `login` WHERE `id` = :id;");
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
    public function locate(){
        $stmt = $this->conn->prepare("SELECT * FROM `login` WHERE `email` = :email");
        $stmt->bindParam(":email", $this->email);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
}
?>