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
            array($personne->getNom(), $personne->getPrenom(), $personne->getDateNaissance(), $personne->getLieuNaissance(), $personne->getDateDeces(), $personne->getLieuDeces())
        );
        $personne->setId($this->bdd->lastInsertId());
    }

    public function update(Personne $personne)
    {
        $this->bdd->execQuery(
            "UPDATE dpsk_personne SET nom = ?, prenom = ?, date_de_naissance = ?, lieu_de_naissance = ?, date_de_deces = ?, lieu_de_deces = ? WHERE personne_id = ?",
            array($personne->getNom(), $personne->getPrenom(), $personne->getDateNaissance(), $personne->getLieuNaissance(), $personne->getDateDeces(), $personne->getLieuDeces(), $personne->getId())
        );
    }

    public function delete(Personne $personne)
    {
        $this->bdd->execQuery(
            "DELETE ON CASCADE FROM dpsk_personne WHERE personne_id = ?",
            array($personne->getId())
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
