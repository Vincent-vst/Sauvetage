<?php

class SauveteurDAO
{
    protected $bdd;

    public function __construct(BDD $bdd)
    {
        $this->bdd = $bdd;
    }

    public function add(Sauveteur $naufrage)
    {
        $this->bdd->execQuery(
            "INSERT INTO dpsk_personne (nom, prenom, date_de_naissance, lieu_de_naissance, date_de_deces, lieu_de_deces) VALUES (?, ?, ?, ?, ?, ?)",
            array($naufrage->get_nom(), $naufrage->get_prenom(), $naufrage->get_date_de_naissance(), $naufrage->get_lieu_de_naissance(), $naufrage->get_date_de_deces(), $naufrage->get_lieu_de_deces())
        );
        $naufrage->set_personne_id($this->bdd->lastInsertId());
        $this->bdd->execQuery(
            "INSERT INTO dmfr_sauveteur (metier, personne_id) VALUES (?, ?)",
            array($naufrage->get_metier(), $naufrage->get_personne_id())
        );
        $naufrage->set_sauveteur_id($this->bdd->lastInsertId());
    }

    public function update(Sauveteur $naufrage)
    {
        $this->bdd->execQuery(
            "UPDATE dpsk_personne SET nom = ?, prenom = ?, date_de_naissance = ?, lieu_de_naissance = ?, date_de_deces = ?, lieu_de_deces = ? WHERE personne_id = ?",
            array($naufrage->get_nom(), $naufrage->get_prenom(), $naufrage->get_date_de_naissance(), $naufrage->get_lieu_de_naissance(), $naufrage->get_date_de_deces(), $naufrage->get_lieu_de_deces(), $naufrage->get_personne_id())
        );
        $this->bdd->execQuery(
            "UPDATE dmfr_sauveteur SET metier = ? WHERE sauveteur_id = ?",
            array($naufrage->get_metier())
        );

    }

    public function delete(Sauveteur $naufrage)
    {
        $this->bdd->execQuery(
            "DELETE FROM dpsk_personne WHERE personne_id = ?",
            array($naufrage->get_personne_id())
        );
    }

    public function getById(int $id): ?Sauveteur
    {
        $sauveteur = $this->bdd->execQuery(
            "SELECT * FROM dpsk_personne NATURAL JOIN dmfr_sauveteur WHERE sauveteur_id = ? ",
            array($id)
        );

        if (count($sauveteur) !== 0) {
            return new Sauveteur($sauveteur[0]);
        } else {
            return null;
        }
    }


}
