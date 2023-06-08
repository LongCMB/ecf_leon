<?php

class BrandManager
{
    protected PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function create(Brand $brand)
    {
        $sql = "INSERT INTO marques (marque) VALUES (:marque);";
        $q = $this->db->prepare($sql);
        $q->bindValue(':marque', $brand->getBrand());
        try {
            $q->execute();
            $id = $this->db->lastInsertId();
            $brand->hydrater(['id' => $id]);
            // echo '<pre>';
            // var_dump($auteur);
            // echo '</pre>';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * 
     * @return array
     */
    public function findAll(): array
    {
        $sql = "SELECT * FROM marques";
        $q = $this->db->query($sql);
        return $q->fetchAll(PDO::FETCH_CLASS);
    }

    public function findById(int $id)
    {
        $sql = "SELECT * FROM marques WHERE id = :id;";
        $q = $this->db->prepare($sql);
        $q->bindValue(':id', $id);
        try {
            $q->execute();
            $result = $q->fetch(PDO::FETCH_ASSOC);
            // return $result;
            return new Brand($result);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
