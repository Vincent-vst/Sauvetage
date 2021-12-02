<?php

class SauveteurDAO
{
    private $bdd;

    public function __construct(BDD $bdd)
    {
        $this->bdd = $bdd;
    }

    public function add(Sauveteur $sauveteur)
    {
        $this->bdd->execQuery(
            "INSERT INTO dpsk_personne (nom, prenom, date_de_naissance, lieu_de_naissance, date_de_deces, lieu_de_deces) VALUES (?, ?, ?, ?, ?, ?)",
            array($sauveteur->get_nom(), $sauveteur->get_prenom(), $sauveteur->get_date_de_naissance(), $sauveteur->get_lieu_de_naissance(), $sauveteur->get_date_de_deces(), $sauveteur->get_lieu_de_deces())
        );
        $sauveteur->set_personne_id($this->bdd->lastInsertId());
        $this->bdd->execQuery(
            "INSERT INTO dmfr_sauveteur (metier, personne_id) VALUES (?, ?)",
            array($sauveteur->get_metier(), $sauveteur->get_personne_id())
        );
    }

    public function update(Sauveteur $sauveteur)
    {
        $this->bdd->execQuery(
            "UPDATE dpsk_personne SET nom = ?, prenom = ?, date_de_naissance = ?, lieu_de_naissance = ?, date_de_deces = ?, lieu_de_deces = ? WHERE personne_id = ?",
            array($sauveteur->get_nom(), $sauveteur->get_prenom(), $sauveteur->get_date_de_naissance(), $sauveteur->get_lieu_de_naissance(), $sauveteur->get_date_de_deces(), $sauveteur->get_lieu_de_deces(), $sauveteur->get_personne_id())
        );
        $this->bdd->execQuery(
            "UPDATE dmfr_sauveteur SET metier = ? WHERE sauveteur_id = ?",
            array($sauveteur->get_metier())
        );

    }

    public function delete(Sauveteur $sauveteur)
    {
        $this->bdd->execQuery(
            "DELETE ON CASCADE FROM dpsk_personne WHERE personne_id = ?",
            array($sauveteur->get_personne_id())
        );
    }


}
