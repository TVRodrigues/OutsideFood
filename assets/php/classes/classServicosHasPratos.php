<?php
require_once 'database.php';

use \PDO;
use \PDOException;


class ServicosHasPratos {

    private $servicos_id;
    private $pratos_id;

    public function __construct(){
        $database = new Database();
        $this->conn = $database->dbSet();
    }

    public function insert() {
        $query = "INSERT INTO `servicos_has_pratos` VALUES(:servicos_id, :pratos_id);";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':servicos_id', $this->servicos_id, PDO::PARAM_INT);
        $stmt->bindParam(':pratos_id', $this->pratos_id, PDO::PARAM_INT);
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $this->conn->lastInsertId();
    }

    public function delete($id) {
        $query = "DELETE FROM `servicos_has_pratos` WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getPratosId()
    {
        return $this->pratos_id;
    }

    public function setPratos($espacos_id)
    {
        $this->pratos_id = $pratos_id;
    }

    public function getServicosId()
    {
        return $this->servicos_id;
    }

    public function setServicos($edicoes_id)
    {
        $this->servicos_id = $servicos_id;
    }

}