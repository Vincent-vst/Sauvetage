<?php
require("Bateau.class.php");

class BateauSauveteur extends Bateau
{
    protected $bateau_sauveteur_id;

    public function __construct(array $donnees)
    {
        parent::__construct($donnees);
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
    public function get_bateau_sauveteur_id()
    {
        return $this->bateau_sauveteur_id;
    }

    /**
     * @param mixed $bateau_sauveteur_id
     */
    public function set_bateau_sauveteur_id($bateau_sauveteur_id): void
    {
        $this->bateau_sauveteur_id = $bateau_sauveteur_id;
    }


}