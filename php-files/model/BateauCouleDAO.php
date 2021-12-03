<?php

class BateauCouleDAO
{
    protected $bdd;

    public function __construct(BDD $bdd)
    {
        $this->bdd = $bdd;
    }

    public function add(BateauCoule $bateau)
    {
        $this->bdd->execQuery(
            "INSERT INTO rids_bateau (nom, type, date_debut_utilisation, date_fin_utilisation) VALUES (?, ?, ?, ?)",
            array($bateau->get_nom(), $bateau->get_type(), $bateau->get_date_debut_utilisation(), $bateau->get_date_fin_utilisation())
        );
        $bateau->set_bateau_id($this->bdd->lastInsertId());
        $this->bdd->execQuery(
            "INSERT INTO dsmr_bateau_coule (bateau_id) VALUES (?)",
            array($bateau->get_bateau_id())
        );
        $bateau->set_bateau_coule_id($this->bdd->lastInsertId());
    }

    public function update(BateauCoule $bateau)
    {
        $this->bdd->execQuery(
            "UPDATE rids_bateau SET nom = ?, type = ?, date_debut_utilisation = ?, date_fin_utilisation = ? WHERE bateau_id = ?",
            array($bateau->get_nom(), $bateau->get_type(), $bateau->get_date_debut_utilisation(), $bateau->get_date_fin_utilisation(), $bateau->get_bateau_id())
        );
    }

    public function delete(BateauCoule $bateau)
    {
        $this->bdd->execQuery(
            "DELETE ON CASCADE FROM rids_bateau WHERE bateau_id = ?",
            array($bateau->get_bateau_id())
        );
    }
}