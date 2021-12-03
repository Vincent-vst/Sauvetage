<?php

class SauvetageDAO
{
    private $bdd;

    public function __construct(BDD $bdd)
    {
        $this->bdd = $bdd;
    }

    public function add(Sauvetage $sauvetage)
    {
        $this->bdd->execQuery(
            "INSERT INTO sdff_sauvetage (sauvetage_id, bateau_coule_id, date) VALUES (?, ?, ?)",
            array($sauvetage->get_sauvetage_id(), $sauvetage->get_bateau_coule_id(), $sauvetage->get_date())
        );
        $sauvetage->set_bateau_coule_id($this->bdd->lastInsertId());
    }

    public function update(Sauvetage $sauvetage)
    {
        $this->bdd->execQuery(
            "UPDATE sdff_sauvetage SET sauvetage_id = ?, bateau_coule_id = ?, date = ? WHERE sauvetage_id = ?",
            array($sauvetage->get_sauvetage_id(), $sauvetage->get_bateau_coule_id(), $sauvetage->get_date(), $sauvetage->get_sauvetage_id())
        );
    }

    public function delete(Sauvetage $sauvetage)
    {
        $this->bdd->execQuery(
            "DELETE FROM sdff_sauvetage WHERE sauvetage_id = ?",
            array($sauvetage->get_sauvetage_id())
        );
    }

    public function getSauvetageWithBateauS(BateauSauveteur $bateau) {
        return $this->bdd->execQuery(
            "SELECT * FROM sdff_sauvetage WHERE sauvetage_id IN (SELECT sauvetage_id FROM dfmp_liste_bateau_sauveteur WHERE bateau_sauveteur_id = ?)",
            array($bateau->get_bateau_sauveteur_id())
        );
    }

}