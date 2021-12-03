<?php
require("Medaille.class.php");

class MedailleDAO
{
    private $bdd;

    public function __construct(BDD $bdd)
    {
        $this->bdd = $bdd;
    }

    public function add(Medaille $medaille)
    {
        $this->bdd->execQuery(
            "INSERT INTO fkdm_medaille (nom) VALUES (?)",
            array($medaille->get_nom())
        );
        $medaille->set_medaille_id($this->bdd->lastInsertId());
    }

    public function update(Medaille $medaille)
    {
        $this->bdd->execQuery(
            "UPDATE fkdm_medaille SET nom = ? WHERE medaille_id = ?",
            array($medaille->get_nom(), $medaille->get_medaille_id())
        );
    }

    public function delete(Medaille $medaille)
    {
        $this->bdd->execQuery(
            "DELETE ON CASCADE FROM fkdm_medaille WHERE medaille_id = ?",
            array($medaille->get_medaille_id())
        );
    }

    public function getById(int $id): ?Medaille
    {
        
            $medaille = $this->bdd->execQuery(
                "SELECT * FROM fkdm_medaille WHERE medaille_id = ?",
                array($id)
            );
    
            if (count($medaille) !== 0) {
                return new Medaille($medaille[0]);
            } else {
                return null;
            }
        
    }

    public function getByName(string $name): array
    {
        $query = $this->bdd->execQuery(
            "SELECT * FROM fkdm_medaille WHERE nom = ?",
            array($name)
        );
        $medaille = array();
        foreach ($query as $medaille) {
            $medaille[] = new Medaille($medaille);
        }
        return $medaille;
    }

}