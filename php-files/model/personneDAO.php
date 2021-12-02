<?php


class personneDAO
{
    private $bdd;

    public function __construct(BDD $bdd)
    {
        $this->bdd = $bdd;
    }

    public function add(Personne $personne)
    {
        $this->bdd->execQuery(
            "INSERT INTO dpsk_personne (nom, prenom, date_de_naissance, lieu_de_naissance, date_de_deces, lieu_de_deces) VALUES (?, ?, ?, ?, ?, ?)",
            array($personne->get_nom(), $personne->get_prenom(), $personne->get_date_de_naissance(), $personne->get_lieu_de_naissance(), $personne->get_date_de_deces(), $personne->get_lieu_de_deces())
        );
        $personne->set_personne_id($this->bdd->lastInsertId());
    }

    public function update(Personne $personne)
    {
        $this->bdd->execQuery(
            "UPDATE dpsk_personne SET nom = ?, prenom = ?, date_de_naissance = ?, lieu_de_naissance = ?, date_de_deces = ?, lieu_de_deces = ? WHERE personne_id = ?",
            array($personne->get_nom(), $personne->get_prenom(), $personne->get_date_de_naissance(), $personne->get_lieu_de_naissance(), $personne->get_date_de_deces(), $personne->get_lieu_de_deces(), $personne->get_personne_id())
        );
    }

    public function delete(Personne $personne)
    {
        $this->bdd->execQuery(
            "DELETE ON CASCADE FROM dpsk_personne WHERE personne_id = ?",
            array($personne->get_personne_id())
        );
    }

    public function getById(int $id): ?Personne
    {
        $personne = $this->bdd->execQuery(
            "SELECT * FROM dpsk_personne WHERE personne_id = ?",
            array($id)
        );

        if (count($personne) !== 0) {
            return new Personne($personne[0]);
        } else {
            return null;
        }
    }

    public function getList(): array
    {
        $query = $this->bdd->execQuery(
            "SELECT * FROM dpsk_personne"
        );

        $personnes = array();
        foreach ($query as $personne) {
            $personnes[] = new Personne($personne);
        }
        return $personne;
    }

    public function getByFullName(string $nom, string $prenom): ?Personne
    {
        $personne = $this->bdd->execQuery(
            "SELECT * FROM dpsk_personne WHERE nom = ? AND prenom = ?",
            array($nom, $prenom)
        );

        if (count($personne) !== 0) {
            return new Personne($personne[0]);
        } else {
            return null;
        }
    }

    public function getByName(string $nom): array
    {
        $query = $this->bdd->execQuery(
            "SELECT * FROM dpsk_personne WHERE nom = ?",
            array($nom)
        );

        $personnes = array();
        foreach ($query as $personne) {
            $personnes[] = new Personne($personne);
        }
        return $personne;
    }
}
