<?php

	/* echo 'hello' . '<br>'; */
	include_once('../model/BDD.class.php');

	/* $userQuerry = $_POST['searcher']; */ 
	/* /1* $sql = "SELECT * FROM rids_bateau WHERE MATCH(nom,type) AGAINST ('%" . $userQuerry . "%')"; *1/ */ 
	$sql = "select * from rids_bateau"; 
	/* echo $userQuerry . '<br>'; */ 
	/* echo "hello world"; */
	$bdd = new BDD(); 

	/* $results = $bdd -> execQuery('select * from fkdm_medaille'); */

	$results = $bdd -> execQuery($sql);


	var_dump($results);	
	

?>
