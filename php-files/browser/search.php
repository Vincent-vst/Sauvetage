<?php

	/* echo 'hello' . '<br>'; */
	include_once('../model/BDD.class.php');

	$userQuerry = $_POST['searcher']; 
	$sql = "SELECT * FROM rids_bateau WHERE MATCH(nom,type) AGAINST ('%" . $userQuerry . "%')"; 
	$bdd = new BDD(); 
	$results = $bdd -> execQuery($sql);
	foreach ($results as $res){
		echo $res["nom"] . "<br>";
	}
	
?>
