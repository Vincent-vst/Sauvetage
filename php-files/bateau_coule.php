<?php
require("./model/BDD.class.php");
require("./model/BateauCoule.class.php");
require("./model/BateauCouleDAO.php");
require("./model/Sauvetage.class.php");
require("./model/SauvetageDAO.php");
$bdd = new BDD();
$BCDAO =  new BateauCouleDAO($bdd);
$SauvetageDAO =  new SauvetageDAO($bdd);

if(isset($_GET["id"]) && !empty($_GET["id"])) {
    $json_data["type"] = "bateau_coule";
    $json_bateau = [];
    $bateau = $BCDAO->getById($_GET["id"]);
    $json_bateau["id"] = $bateau->get_bateau_coule_id();
    $json_bateau["nom"] = $bateau->get_nom();
    $json_bateau["nationalite"] = $bateau->get_nationalite();
    $json_bateau["type"] = $bateau->get_type();
    $json_bateau["date_debut"] = $bateau->get_date_debut_utilisation();
    $json_bateau["date_fin"] = $bateau->get_date_fin_utilisation();
    $sauvetage = $SauvetageDAO->getSauvetageOfBateau($bateau);
    if (count($sauvetage) > 0) {
        $json_bateau["sauvetage"] = [];
        $json_sauvetage["id"] = $sauvetage[0]["sauvetage_id"];
        $json_sauvetage["date"] = $sauvetage[0]["date"];
        $json_bateau["sauvetage"][] = $json_sauvetage;
    }
    $json_data["objet"] = $json_bateau;
    echo json_encode($json_data);
}