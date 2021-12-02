<?php

class Sauveteur extends Personne
{
    protected $sauveteur_id, $metier;

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
    public function get_sauveteur_id()
    {
        return $this->sauveteur_id;
    }

    /**
     * @param mixed $sauveteur_id
     */
    public function set_sauveteur_id($sauveteur_id): void
    {
        $this->sauveteur_id = $sauveteur_id;
    }

    /**
     * @return mixed
     */
    public function get_metier()
    {
        return $this->metier;
    }

    /**
     * @param mixed $metier
     */
    public function set_metier($metier): void
    {
        $this->metier = $metier;
    }


}