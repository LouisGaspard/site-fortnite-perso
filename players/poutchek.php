<?php
    include '../stats/stats.php';

    $link = "https://api.fortnitetracker.com/v1/profile/pc/$name_poutchek";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $link);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'TRN-Api-Key: 7c7a46e4-1917-42ea-bb9a-49a38f548c39'
    ));
    $response = curl_exec($ch);
    curl_close($ch);
    $fp = fopen("../json/poutchek.json", "w");
    fwrite($fp, $response);
    fclose($fp);
    
    $data = json_decode(file_get_contents("../json/poutchek.json"));
    $solo = $data->stats->p2;//solos data
    $duos = $data->stats->p10;//duos data
    $squads = $data->stats->p9;//squads data
    $global = $data->lifeTimeStats;
    $solo_wins = $solo->top1->valueInt;
    $duos_wins = $duos->top1->valueInt;
    $squads_wins = $squads->top1->valueInt;
    $solo_matches = $solo->matches->valueInt;
    $duos_matches = $duos->matches->valueInt;
    $squads_matches = $squads->matches->valueInt;
    $solo_kd = $solo->kd->valueDec;
    $duos_kd = $duos->kd->valueDec;
    $squads_kd = $squads->kd->valueDec;
    $solo_kills = $solo->kills->valueInt;
    $duos_kills = $duos->kills->valueInt;
    $squads_kills = $squads->kills->valueInt;
    $solo_wins_rate = $solo->winRatio->valueDec;
    $duos_wins_rate = $duos->winRatio->valueDec;
    $squads_wins_rate = $squads->winRatio->valueDec;

    $pseudo = $data->epicUserHandle;
    try {
    	$bdd = new PDO('mysql:host=localhost;dbname=louisgas_fortnite;charset=utf8', 'louisgas_root', '0247407365aA');
    }
    catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
    }
    
    $req = $bdd->prepare('UPDATE fortnite SET kills = :nb_kills, win = :nb_wins, kda = :nb_kda, pseudo = :pseudo WHERE id = 1');
    $req->execute(array(
    	'nb_kills' => $global[10]->value / $global[7]->value,
    	'nb_wins' => $global[9]->value,
    	'nb_kda' => $global[11]->value,
    	'pseudo' => $pseudo
    ));
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
        <table cellpadding="15">
            </br></br>
            <tr>
                <th></th>
                <th><a>Solo</a></th>
                <th><a>Duo</a></th>
                <th><a>Squads</a></th>
                <th><a>Global</a></th>
            </tr>
            <tr>
                <td><a>Wins</a></td>
                <td><a><?php echo $solo_wins ?></a></td>
                <td><a><?php echo $duos_wins ?></a></td>
                <td><a><?php echo $squads_wins ?></a></td>
                <td><a><?php echo $global[8]->value; ?></a></td>
            </tr>
            <tr>
                <td><a>Winrate</a></td>
                <td><a><?php echo $solo_wins_rate ?></a></td>
                <td></td>
                <td><a><?php echo $squads_wins_rate ?></a></td>
                <td><a><?php echo $global[9]->value; ?></a></td>
            </tr>
            <tr>
                <td><a>Matches</a></td>
                <td><a><?php echo $solo_matches ?></a></td>
                <td><a><?php echo $duos_matches ?></a></td>
                <td><a><?php echo $squads_matches ?></a></td>
                <td><a><?php echo $global[7]->value; ?></a></td>
            </tr>
            <tr>
                <td><a>Kills</a></td>
                <td><a><?php echo $solo_kills ?></a></td>
                <td><a><?php echo $duos_kills ?></a></td>
                <td><a><?php echo $squads_kills ?></a></td>
                <td><a><?php echo $global[10]->value; ?></a></td>
            </tr>
            <tr>
                <td><a>KDA</a></td>
                <td><a><?php echo $solo_kd ?></a></td>
                <td><a><?php echo $duos_kd ?></a></td>
                <td><a><?php echo $squads_kd ?></a></td>
                <td><a><?php echo $global[11]->value; ?></a></td>
            </tr>
        </table>
    </body>
</html>