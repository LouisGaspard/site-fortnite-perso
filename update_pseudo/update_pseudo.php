<?php
    include '../stats/stats.php';
    
    try {
    	$bdd = new PDO('mysql:host=localhost;dbname=louisgas_fortnite;charset=utf8', 'louisgas_root', '0247407365aA');
    }
    catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
    }
    
?>

<html>
    <head>
        <meta charset="UTF-8" />
        <title>Louis Gaspard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet" type="text/css" href="../index.css">
    </head>
    <body>
        <?php include '../navbar/navbar.php'; ?>
        <form method="post" name="update" action="update.php"/><a style="color:white">Pseudo :</a>
            <?php
                $query = "SELECT id, pseudo FROM fortnite";
                try {
                    $pdo_select = $bdd->prepare($query);
                	$pdo_select->execute();
                 
                    echo '<select name="m_select">';
                    echo '<option value="">Pseudo</option>';
                    while ($row = $pdo_select->fetch()) {
                        echo '<option value="'.$row['id'].'">'.$row['pseudo'].'</option>';
                    }
                    echo '</select>';
                } catch (PDOException $e){ 
            echo 'Erreur SQL : '. $e->getMessage().'<br/>'; 
            }
            ?>
            <input type="text" name="user" />
            <input type="submit" name="Submit" value="update" />
        </form>
    </body>
</html>