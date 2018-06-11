<?php
    include 'stats/stats.php';
    
    try {
    	$bdd = new PDO('mysql:host=localhost;dbname=louisgas_fortnite;charset=utf8', 'louisgas_root', '0247407365aA');
    }
    catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
    }
    
    //hightest
    $req = $bdd->query("SELECT pseudo, kda FROM fortnite order by kda desc limit 1");
    $b_kda = $req->fetch();
    $req = $bdd->query("SELECT pseudo, win FROM fortnite order by win desc limit 1");
    $b_win = $req->fetch();
    $req = $bdd->query("SELECT pseudo, kills FROM fortnite order by kills desc limit 1");
    $b_kills = $req->fetch();
    
    //worstest REMOVE WHERE ID != 1 quand pseudo poutchek changed
    $req = $bdd->query("SELECT pseudo, kda FROM fortnite where id != 1 order by kda limit 1");
    $m_kda = $req->fetch();
    $req = $bdd->query("SELECT pseudo, win FROM fortnite where id != 1 order by win limit 1");
    $m_win = $req->fetch();
    $req = $bdd->query("SELECT pseudo, kills FROM fortnite where id != 1 order by kills limit 1");
    $m_kills = $req->fetch();
?>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Louis Gaspard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet" type="text/css" href="index.css">
    </head>
    <body>
        <?php include 'navbar/navbar.php'; ?>
        </br>
        <table>
            <td>
                <table cellpadding="15">
                    <tr>
                        <th></th>
                        <th><a>Hightest</a></th>
                        <th></th>
                    </tr>
                    <tr>
                        <td><a>KDA</a></td>
                        <td><a><?php echo $b_kda["pseudo"]; ?></a></td>
                        <td align="right"><a><?php echo $b_kda["kda"]; ?></a></td>
                    </tr>
                    <tr>
                        <td><a>Winrate</a></td>
                        <td><a><?php echo $b_win["pseudo"]; ?></a></td>
                        <td align="right"><a><?php echo $b_win["win"] . " %"; ?></a></td>
                    </tr>
                    <tr>
                        <td><a>Kills per game</a></td>
                        <td><a><?php echo $b_kills["pseudo"]; ?></a></td>
                        <td align="right"><a><?php echo round($b_kills["kills"], 2); ?></a></td>
                    </tr>
                </table>
            </td>
            <td>
                <table cellpadding="15">
                    <tr>
                        <th></th>
                        <th><a>Worstest</a></th>
                        <th></th>
                    </tr>
                    <tr>
                        <td><a>KDA</a></td>
                        <td><a><?php echo $m_kda["pseudo"]; ?></a></td>
                        <td align="right"><a><?php echo $m_kda["kda"]; ?></a></td>
                    </tr>
                    <tr>
                        <td><a>Winrate</a></td>
                        <td><a><?php echo $m_win["pseudo"]; ?></a></td>
                        <td align="right"><a><?php echo $m_win["win"] . " %"; ?></a></td>
                    </tr>
                    <tr>
                        <td><a>Kills per game</a></td>
                        <td><a><?php echo $m_kills["pseudo"]; ?></a></td>
                        <td align="right"><a><?php echo round($m_kills["kills"], 2); ?></a></td>
                    </tr>
                </table>
            </td>
        </table>
        </br>
        <?php include 'shop/shop.php'?>
    </body>
</html>