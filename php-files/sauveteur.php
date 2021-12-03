<?php
require("./model/BDD.class.php");
require("./model/Sauveteur.class.php");
require("./model/SauveteurDAO.php");
require("./model/Sauvetage.class.php");
require("./model/SauvetageDAO.php");
$bdd = new BDD();
$SauveteurDAO =  new SauveteurDAO($bdd);
$SauvetageDAO =  new SauvetageDAO($bdd);

if(isset($_GET["id"]) && !empty($_GET["id"])) {
    $json_data["type"] = "sauveteur";
    $json_sauveteur = [];
    $sauveteur = $SauveteurDAO->getById($_GET["id"]);
    $json_sauveteur["id"] = $sauveteur->get_sauveteur_id();
    $json_sauveteur["nom"] = $sauveteur->get_nom();
    $json_sauveteur["prenom"] = $sauveteur->get_prenom();
    $json_sauveteur["date_naissance"] = $sauveteur->get_date_de_naissance();
    $json_sauveteur["lieu_naissance"] = $sauveteur->get_lieu_de_naissance();
    $json_sauveteur["date_deces"] = $sauveteur->get_date_de_deces();
    $json_sauveteur["lieu_deces"] = $sauveteur->get_lieu_de_deces();
    $json_sauveteur["metier"] = $sauveteur->get_metier();
    $json_medailles = [];
    $medailles = $bdd->execQuery(
        "SELECT * FROM fkdm_medaille NATURAL JOIN dlef_aquisition_medaille NATURAL JOIN dmfr_sauveteur WHERE sauveteur_id = ?",
        array($sauveteur->get_sauveteur_id())
    );
    foreach ($medailles as $medaille) {
        $medaille_data["nom"] = $medaille["nom"];
        $medaille_data["id"] = $medaille["medaille_id"];
        $medaille_data["date"] = $medaille["date"];
        $json_medailles[] = $medaille_data;
    }
    $json_sauveteur["medailles"] = $json_medailles;
    $json_sauvetages = [];
    $sauvetages = $SauvetageDAO->getSauvetageWithSauveteur($sauveteur->get_sauveteur_id());
    foreach ($sauvetages as $sauvetage) {
        $json_sauvetage["id"] = $sauvetage["sauvetage_id"];
        $json_sauvetage["date"] = $sauvetage["date"];
        $bateau = $bdd->execQuery(
            "SELECT nom FROM rids_bateau NATURAL JOIN dsmr_bateau_coule NATURAL JOIN sdff_sauvetage WHERE sauvetage_id = ?",
            array($sauvetage["sauvetage_id"])
        )[0];
        $json_sauvetage["bateau_coule"] = $bateau["nom"];
        $json_sauvetages[] = $json_sauvetage;
    }
    $json_sauveteur["sauvetages"] = $json_sauvetages;
    $json_data["objet"] = [$json_sauveteur];
    echo json_encode($json_data);
}
