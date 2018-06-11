<?php
    $data_poutchek = json_decode(file_get_contents("/home/louisgas/public_html/json/poutchek.json"));
    $global_poutchek = $data_poutchek->lifeTimeStats;
    
    $data_asten = json_decode(file_get_contents("/home/louisgas/public_html/json/asten.json"));
    $global_asten = $data_asten->lifeTimeStats;
    
    $data_ezhze = json_decode(file_get_contents("/home/louisgas/public_html/json/ezhze.json"));
    $global_ezhze = $data_ezhze->lifeTimeStats;
    
    $data_laufen = json_decode(file_get_contents("/home/louisgas/public_html/json/laufen.json"));
    $global_laufen = $data_laufen->lifeTimeStats;
    
    $data_pledly = json_decode(file_get_contents("/home/louisgas/public_html/json/pledly.json"));
    $global_pledly = $data_pledly->lifeTimeStats;
    
    $data_zalman = json_decode(file_get_contents("/home/louisgas/public_html/json/zalman.json"));
    $global_zalman = $data_zalman->lifeTimeStats;
    
    $data_lpkbe = json_decode(file_get_contents("/home/louisgas/public_html/json/lpkbe.json"));
    $global_lpkbe = $data_lpkbe->lifeTimeStats;
    
    try {
    	$bdd = new PDO('mysql:host=localhost;dbname=louisgas_fortnite;charset=utf8', 'louisgas_root', '0247407365aA');
    }
    catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
    }
    
    $sql =  $bdd->query('SELECT pseudo FROM fortnite where id = 1');
    $donnees = $sql->fetch();
    $name_poutchek = $donnees['pseudo'];
    
    $sql =  $bdd->query('SELECT pseudo FROM fortnite where id = 2');
    $donnees = $sql->fetch();
    $name_asten = $donnees['pseudo'];
    
    $sql =  $bdd->query('SELECT pseudo FROM fortnite where id = 3');
    $donnees = $sql->fetch();
    $name_ezhze = $donnees['pseudo'];
    
    $sql =  $bdd->query('SELECT pseudo FROM fortnite where id = 4');
    $donnees = $sql->fetch();
    $name_laufen = $donnees['pseudo'];
    
    $sql =  $bdd->query('SELECT pseudo FROM fortnite where id = 7');
    $donnees = $sql->fetch();
    $name_pledly = $donnees['pseudo'];
    
    $sql =  $bdd->query('SELECT pseudo FROM fortnite where id = 6');
    $donnees = $sql->fetch();
    $name_zalman = $donnees['pseudo'];
    
    $sql =  $bdd->query('SELECT pseudo FROM fortnite where id = 5');
    $donnees = $sql->fetch();
    $name_lpkbe = $donnees['pseudo'];
?>