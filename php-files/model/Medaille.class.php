<?php

class Medaille
{
    protected $medaille_id, $nom;

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
    public function get_medaille_id()
    {
        return $this->medaille_id;
    }

    /**
     * @param mixed $medaille_id
     */
    public function set_medaille_id($medaille_id): void
    {
        $this->medaille_id = $medaille_id;
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


}