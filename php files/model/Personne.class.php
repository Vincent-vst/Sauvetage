<?php

class Personne
{

    protected $personne_id, $nom, $prenom, $date_de_naissance, $lieu_de_naissance, $date_de_deces, $lieu_de_deces;

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }


    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function get_personne_id()
    {
        return $this->personne_id;
    }

    /**
     * @param mixed $personne_id
     */
    public function set_personne_id($personne_id): void
    {
        $this->personne_id = $personne_id;
    }

    /**
     * @return mixed
     */
    public function get_nom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function set_nom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function get_prenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function set_prenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function get_date_de_naissance()
    {
        return $this->date_de_naissance;
    }

    /**
     * @param mixed $date_de_naissance
     */
    public function set_date_de_naissance($date_de_naissance): void
    {
        $this->date_de_naissance = $date_de_naissance;
    }

    /**
     * @return mixed
     */
    public function get_lieu_de_naissance()
    {
        return $this->lieu_de_naissance;
    }

    /**
     * @param mixed $lieu_de_naissance
     */
    public function set_lieu_de_naissance($lieu_de_naissance): void
    {
        $this->lieu_de_naissance = $lieu_de_naissance;
    }

    /**
     * @return mixed
     */
    public function get_date_de_deces()
    {
        return $this->date_de_deces;
    }

    /**
     * @param mixed $date_de_deces
     */
    public function set_date_de_deces($date_de_deces): void
    {
        $this->date_de_deces = $date_de_deces;
    }

    /**
     * @return mixed
     */
    public function get_lieu_de_deces()
    {
        return $this->lieu_de_deces;
    }

    /**
     * @param mixed $lieu_de_deces
     */
    public function set_lieu_de_deces($lieu_de_deces): void
    {
        $this->lieu_de_deces = $lieu_de_deces;
    }



}
