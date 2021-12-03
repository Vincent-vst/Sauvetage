<?php

class BateauSauveteurDAO
{
    protected $bdd;

    public function __construct(BDD $bdd)
    {
        $this->bdd = $bdd;
    }

    public function add(BateauSauveteur $bateau)
    {
        $this->bdd->execQuery(
            "INSERT INTO rids_bateau (nom, type, date_debut_utilisation, date_fin_utilisation, nationalite) VALUES (?, ?, ?, ?, ?)",
            array($bateau->get_nom(), $bateau->get_type(), $bateau->get_date_debut_utilisation(), $bateau->get_date_fin_utilisation(), $bateau->get_nationalite())
        );
        $bateau->set_bateau_id($this->bdd->lastInsertId());
        $this->bdd->execQuery(
            "INSERT INTO kdfm_bateau_sauveteur (bateau_id) VALUES (?)",
            array($bateau->get_bateau_id())
        );
        $bateau->set_bateau_sauveteur_id($this->bdd->lastInsertId());
    }

    public function update(BateauSauveteur $bateau)
    {
        $this->bdd->execQuery(
            "UPDATE rids_bateau SET nom = ?, type = ?, date_debut_utilisation = ?, date_fin_utilisation = ? WHERE bateau_id = ?",
            array($bateau->get_nom(), $bateau->get_type(), $bateau->get_date_debut_utilisation(), $bateau->get_date_fin_utilisation(), $bateau->get_bateau_id())
        );
    }

    public function delete(BateauSauveteur $bateau)
    {
        $this->bdd->execQuery(
            "DELETE FROM rids_bateau WHERE bateau_id = ?",
            array($bateau->get_bateau_id())
        );
    }

    public function getById($id): ?BateauSauveteur
    {
        $bateau = $this->bdd->execQuery(
            "SELECT * FROM kdfm_bateau_sauveteur NATURAL JOIN rids_bateau WHERE bateau_sauveteur_id = ?",
            array($id)
        );

        if (count($bateau) !== 0) {
            return new BateauSauveteur($bateau[0]);
        } else {
            return null;
        }
    }

}