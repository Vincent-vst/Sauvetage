<?php
require("Bateau.class.php");

class BateauCoule extends Bateau
{
    protected $bateau_coule_id;

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
    public function get_bateau_coule_id()
    {
        return $this->bateau_coule_id;
    }

    /**
     * @param mixed $bateau_coule_id
     */
    public function set_bateau_coule_id($bateau_coule_id): void
    {
        $this->bateau_coule_id = $bateau_coule_id;
    }
}