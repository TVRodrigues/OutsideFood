<?php
require_once 'database.php';

use \PDO;
use \PDOException;


class ColorHasProducts {

    private $edicoes_id;
    private $espacos_id;

    public function __construct(){
        $database = new Database();
        $this->conn = $database->dbSet();
    }

    public function insert() {
        $query = "INSERT INTO `edicoes_has_espacos` VALUES(:edicoes_id, :espacos_id);";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':edicoes_id', $this->edicoes_id, PDO::PARAM_INT);
        $stmt->bindParam(':espacos_id', $this->espacos_id, PDO::PARAM_INT);
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $this->conn->lastInsertId();
    }

    public function delete($id) {
        $query = "DELETE FROM `edicoes_has_espacos` WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getEspacosId()
    {
        return $this->espacos_id;
    }

    public function setEspacos($espacos_id)
    {
        $this->espacos_id = $espacos_id;
    }

    public function getEdicoesId()
    {
        return $this->edicoes_id;
    }

    public function setEdicoes($edicoes_id)
    {
        $this->edicoes_id = $edicoes_id;
    }

}