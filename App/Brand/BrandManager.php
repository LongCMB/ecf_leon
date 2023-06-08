<?php

namespace App\Brand;
use PDO;
use PDOException;

/**
 * Classe BrandManager
 *
 * Description : Cette classe est responsable de la gestion des opérations de base de données.
 * Elle permet d'effectuer des requêtes SQL, récupérer des données à partir de la base de données,
 * et effectuer des opérations de création.
 *
 */
class BrandManager
{
    protected PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    /**
     * Méthode create
     *
     * Description : Crée un nouvel enregistrement dans la table associée à cette classe Manager.
     *
     * @param Brand $brand L'objet de l'entité à créer.
     * @return mixed L'enregistrement créé sous forme d'objet de l'entité associée.
     * @throws Exception Si l'enregistrement existe déjà.
     */
    
    public function create(Brand $brand)
    {
        $sql = "INSERT INTO marques (marque) VALUES (:marque);";
        $q = $this->db->prepare($sql);
        $q->bindValue(':marque', $brand->getBrand());
        try {
            $q->execute();
            $id = $this->db->lastInsertId();
            $brand->hydrate(['id' => $id]);
            // echo '<pre>';
            // var_dump($auteur);
            // echo '</pre>';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    /**
     * Méthode findAll
     *
     * Description : Récupère tous les enregistrements de la table associée à cette classe Manager.
     *
     * @return array Un tableau contenant tous les enregistrements sous forme d'objets de l'entité associée.
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
