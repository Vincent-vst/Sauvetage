<?php

class Sauvetage
{
    protected $sauvetage_id, $bateau_coule_id, $date;

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
    public function get_sauvetage_id()
    {
        return $this->sauvetage_id;
    }

    /**
     * @param mixed $sauvetage_id
     */
    public function set_sauvetage_id($sauvetage_id): void
    {
        $this->sauvetage_id = $sauvetage_id;
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

    /**
     * @return mixed
     */
    public function get_date()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function set_date($date): void
    {
        $this->date = $date;
    }



}