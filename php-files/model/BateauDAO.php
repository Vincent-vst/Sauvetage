<?php

class BateauDAO
{
    protected $bdd;

    public function __construct(BDD $bdd)
    {
        $this->bdd = $bdd;
    }

    public function add(Bateau $bateau)
    {
        $this->bdd->execQuery(
            "INSERT INTO rids_bateau (nom, type, date_debut_utilisation, date_fin_utilisation) VALUES (?, ?, ?, ?)",
            array($bateau->get_nom(), $bateau->get_type(), $bateau->get_date_debut_utilisation(), $bateau->get_date_fin_utilisation())
        );
        $bateau->set_bateau_id($this->bdd->lastInsertId());
    }

    public function update(Bateau $bateau)
    {
        $this->bdd->execQuery(
            "UPDATE rids_bateau SET nom = ?, type = ?, date_debut_utilisation = ?, date_fin_utilisation = ? WHERE bateau_id = ?",
            array($bateau->get_nom(), $bateau->get_type(), $bateau->get_date_debut_utilisation(), $bateau->get_date_fin_utilisation(), $bateau->get_bateau_id())
        );
    }

    public function delete(Bateau $bateau)
    {
        $this->bdd->execQuery(
            "DELETE ON CASCADE FROM rids_bateau WHERE bateau_id = ?",
            array($bateau->get_bateau_id())
        );
    }

    public function getById($id) {
        $bateau = $this->bdd->execQuery(
            "SELECT * FROM rids_bateau WHERE bateau_id = ?",
            array($id)
        );

        if (count($bateau) !== 0) {
            return new Bateau($bateau[0]);
        } else {
            return null;
        }
    }

    public function getList() {
        $query = $this->bdd->execQuery(
            "SELECT * FROM rids_bateau"
        );

        $bateaux = array();
        foreach ($query as $bateau) {
            $bateaux[] = new Bateau($bateau);
        }
        return $bateaux;
    }

    public function getByName($name) {
        $query = $this->bdd->execQuery(
            "SELECT * FROM rids_bateau WHERE LOWER(nom) = LOWER(?)",
            array($name)
        );

        $bateaux = array();
        foreach ($query as $bateau) {
            $bateaux[] = new Bateau($bateau);
        }
        return $bateaux;
    }

    // Possibilité d'implémenter l'accès par nationalité ou par type

}