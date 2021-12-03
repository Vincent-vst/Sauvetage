<?php

class Bateau
{
    protected $bateau_id, $nom, $type, $date_debut_utilisation, $date_fin_utilisation, $nationalite;

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set_' . $key;

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function get_bateau_id()
    {
        return $this->bateau_id;
    }

    /**
     * @param mixed $bateau_id
     */
    public function set_bateau_id($bateau_id): void
    {
        $this->bateau_id = $bateau_id;
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
    public function get_type()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function set_type($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function get_date_debut_utilisation()
    {
        return $this->date_debut_utilisation;
    }

    /**
     * @param mixed $date_debut_utilisation
     */
    public function set_date_debut_utilisation($date_debut_utilisation): void
    {
        $this->date_debut_utilisation = $date_debut_utilisation;
    }

    /**
     * @return mixed
     */
    public function get_date_fin_utilisation()
    {
        return $this->date_fin_utilisation;
    }

    /**
     * @param mixed $date_fin_utilisation
     */
    public function set_date_fin_utilisation($date_fin_utilisation): void
    {
        $this->date_fin_utilisation = $date_fin_utilisation;
    }

    /**
     * @return mixed
     */
    public function get_nationalite()
    {
        return $this->nationalite;
    }

    /**
     * @param mixed $nationalite
     */
    public function set_nationalite($nationalite): void
    {
        $this->nationalite = $nationalite;
    }



}