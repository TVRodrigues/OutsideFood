<?php
require_once 'database.php';

use \PDO;
use \PDOException;


class PratosHasIngredientes {

    private $ingredientes_id;
    private $pratos_id;

    public function __construct(){
        $database = new Database();
        $this->conn = $database->dbSet();
    }

    public function insert() {
        $query = "INSERT INTO `ingredientes_has_pratos` VALUES(:ingredientes_id, :pratos_id);";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':ingredientes_id', $this->ingredientes_id, PDO::PARAM_INT);
        $stmt->bindParam(':pratos_id', $this->pratos_id, PDO::PARAM_INT);
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $this->conn->lastInsertId();
    }

    public function delete($id) {
        $query = "DELETE FROM `pratos_has_ingredientes` WHERE id = :id";
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

    public function getIngredientesId()
    {
        return $this->servicos_id;
    }

    public function setIngredientes($edicoes_id)
    {
        $this->ingredientes_id = $ingredientes_id;
    }

}