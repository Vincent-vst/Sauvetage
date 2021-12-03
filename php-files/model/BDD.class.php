<?php

class BDD
{
    protected $connexion;
    protected $query;

    public function __construct($host = "pma.ndi.unicolo.re", $user = "db_lesinfox", $pwd = "861fa343f1ba6", $db = "db_lesinfox")
    {
        try {
            $this->connexion = new PDO("mysql:host=" . $host . ";dbname=" . $db . ";charset=utf8", $user, $pwd);
        } catch (Exception $e) {
            exit("Erreur : " . $e->getMessage());
        }
    }

    public function execQuery($query, array $params = array()): array
    {
        $this->query = $this->connexion->prepare($query);
        $this->query->execute($params);
        return $this->query->fetchAll();
    }

    public function lastInsertId(): string
    {
        return $this->connexion->lastInsertId();
    }
}

$bdd = new BDD();
