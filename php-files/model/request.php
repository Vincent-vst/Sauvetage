<?php
    
    include_once('BDD.class.php');
    $bdd = new BDD();     
    
    function test(){
        $results = $bdd -> execQuery('select * from fkdm_medaille');
        
    }

?>
