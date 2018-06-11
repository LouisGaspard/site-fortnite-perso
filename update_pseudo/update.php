<?php
    $servername = "localhost";
    $username = "louisgas_root";
    $password = "0247407365aA";
    $dbname = "louisgas_fortnite";

    $var = $_POST['m_select'];
    $user = $_POST['user'];

    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('UPDATE fortnite SET pseudo = ? WHERE id = ?');
    $req->execute(array($user, $var));
    
?>

echo "<script type='text/javascript'>document.location.replace('/');</script>";
