<?php

/**
 * Classe Brand
 *
 * Description : Représente l'entité Brand.
 */
class Brand
{
    private readonly int $id;
    private string|null $brand=null;
    private string|null $date_de_motif=null;

    public function __construct(array|null $data = null)
    {
        if (!is_null($data)) {
            $this->hydrate($data);
        }
    }
    /**
     * Méthode hydrate
     *
     * Description : Hydrate l'entité avec les données fournies.
     *
     * @param array $data Les données à utiliser pour l'hydratation.
     * @return self L'objet Brand hydraté.
     */

    public function hydrate(array $data):self
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists(__CLASS__, $method)) {
                $this->$method($value);
            }
        }
        return $this;
    }

    /**
     * Méthode is_new
     *
     * Description : Vérifie si l'entité est nouvelle (non enregistrée en base de données).
     *
     * @return bool True si l'entité est nouvelle, sinon False.
     */
    public function is_new(): bool
    {
        return !isset($this->id);
    }

    /**
     * Retourne l'id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Met à  jour l'id
     *
     * @param integer $id
     * @return self
     */
    public function setId(int $id): self
    {
        if ($id <= 0) {
            throw new Exception('ID doit être positive !');
        } else{
            $this->id = $id;
            return $this;
        }
    }

    /**
     * Retourne l'brand
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * UModifier l'brand
     *
     * @param string $brand
     * @return self
     */
    public function setBrand(string $brand): self
    {
        if (strlen($brand)>63) {
            trigger_error('Trop long !', E_USER_ERROR);
        }
        $this->brand = $brand;
        return $this;
    }

    /**
     * @return string
     */
    public function getDate_de_motif(): string
    {
        return $this->date_de_motif;
    }

    /**
     * @param string $date_de_motif 
     * @return self
     */
    public function setDate_de_motif(string $date_de_motif): self
    {
        $this->date_de_motif = $date_de_motif;
        return $this;
    }
}
