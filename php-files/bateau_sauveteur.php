<?php
require("./model/BDD.class.php");
require("./model/BateauSauveteur.class.php");
require("./model/BateauSauveteurDAO.php");
require("./model/Sauvetage.class.php");
require("./model/SauvetageDAO.php");
$bdd = new BDD();
$BSDAO =  new BateauSauveteurDAO($bdd);
$SauvetageDAO =  new SauvetageDAO($bdd);

if(isset($_GET["id"]) && !empty($_GET["id"])) {
    $json_data["type"] = "bateau_sauveteur";
    $json_bateau = [];
    $bateau = $BSDAO->getById($_GET["id"]);
    $json_bateau["id"] = $bateau->get_bateau_sauveteur_id();
    $json_bateau["nom"] = $bateau->get_nom();
    $json_bateau["nationalite"] = $bateau->get_nationalite();
    $json_bateau["type"] = $bateau->get_type();
    $json_bateau["date_debut"] = $bateau->get_date_debut_utilisation();
    $json_bateau["date_fin"] = $bateau->get_date_fin_utilisation();

    $sauvetages = $SauvetageDAO->getSauvetageWithBateauS($bateau);
    $json_bateau["sauvetages"] = [];
    foreach ($sauvetages as $sauvetage) {
        $json_sauvetage["id"] = $sauvetage["sauvetage_id"];
        $json_sauvetage["date"] = $sauvetage["date"];
        $bateau_coule = $bdd->execQuery(
            "SELECT * FROM rids_bateau NATURAL JOIN dsmr_bateau_coule WHERE bateau_coule_id = ?",
            array($sauvetage["bateau_coule_id"])
        )[0];

        $json_sauvetage["bateau_coule"] = ["id"=>$bateau_coule["bateau_coule_id"], "nom"=>$bateau_coule["nom"]];
        $json_bateau["sauvetages"][] = $json_sauvetage;
    }

    $json_data["objet"] = $json_bateau;


    echo json_encode($json_data);
}