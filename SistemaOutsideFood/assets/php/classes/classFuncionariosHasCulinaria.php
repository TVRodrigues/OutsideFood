<?php
require_once 'database.php';

use \PDO;
use \PDOException;


class FuncionariosHasCulinaria {

    private $funcionarios_id;
    private $culinaria_id;

    public function __construct(){
        $database = new Database();
        $this->conn = $database->dbSet();
    }

    public function insert() {
        $query = "INSERT INTO `funcionarios_has_culinaria` VALUES(:funcionarios_id, :culinaria_id);";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':funcionarios_id', $this->funcionarios_id, PDO::PARAM_INT);
        $stmt->bindParam(':culinaria_id', $this->culinaria_id, PDO::PARAM_INT);
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $this->conn->lastInsertId();
    }

    public function delete($id) {
        $query = "DELETE FROM `funcionarios_has_culinaria` WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getCulinariaId()
    {
        return $this->culinaria_id;
    }

    public function setCulinaria($espacos_id)
    {
        $this->pratos_id = $culinaria_id;
    }

    public function getFuncionariosId()
    {
        return $this->funcionarios_id;
    }

    public function setFuncionarios($edicoes_id)
    {
        $this->funcionarios_id = $funcionarios_id;
    }

}