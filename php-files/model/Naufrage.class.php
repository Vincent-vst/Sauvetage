<?php
require("Personne.class.php");

class Naufrage extends Personne
{
protected $naufrage_id;

    public function __construct(array $donnees)
    {
        parent::__construct($donnees);
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
    public function get_naufrage_id()
    {
        return $this->naufrage_id;
    }

    /**
     * @param mixed $naufrage_id
     */
    public function set_naufrage_id($naufrage_id): void
    {
        $this->naufrage_id = $naufrage_id;
    }


}