<?php
require("PersonneDAO.php");
require("Personne.class.php");

class NaufrageDAO
{
    protected $bdd;

    public function __construct(BDD $bdd)
    {
        $this->bdd = $bdd;
    }

    public function add(Naufrage $naufrage)
    {
        $this->bdd->execQuery(
            "INSERT INTO dpsk_personne (nom, prenom, date_de_naissance, lieu_de_naissance, date_de_deces, lieu_de_deces) VALUES (?, ?, ?, ?, ?, ?)",
            array($naufrage->get_nom(), $naufrage->get_prenom(), $naufrage->get_date_de_naissance(), $naufrage->get_lieu_de_naissance(), $naufrage->get_date_de_deces(), $naufrage->get_lieu_de_deces())
        );
        $naufrage->set_personne_id($this->bdd->lastInsertId());
        $this->bdd->execQuery(
            "INSERT INTO fmdp_naufrage (personne_id) VALUES (?, ?)",
            array($naufrage->get_personne_id())
        );
        $naufrage->set_naufrage_id($this->bdd->lastInsertId());
    }

    public function update(Naufrage $naufrage)
    {
        $this->bdd->execQuery(
            "UPDATE dpsk_personne SET nom = ?, prenom = ?, date_de_naissance = ?, lieu_de_naissance = ?, date_de_deces = ?, lieu_de_deces = ? WHERE personne_id = ?",
            array($naufrage->get_nom(), $naufrage->get_prenom(), $naufrage->get_date_de_naissance(), $naufrage->get_lieu_de_naissance(), $naufrage->get_date_de_deces(), $naufrage->get_lieu_de_deces(), $naufrage->get_personne_id())
        );

    }

    public function delete(Naufrage $naufrage)
    {
        $this->bdd->execQuery(
            "DELETE FROM dpsk_personne WHERE personne_id = ?",
            array($naufrage->get_personne_id())
        );
    }
}