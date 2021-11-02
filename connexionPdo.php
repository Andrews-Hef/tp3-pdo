<?php
$hostnom = 'host=serverbtssiojv.ddns.net';
$usernom = 'agricole';
$password = 'agricole';
$bdd = 'agricole_biblio';
///connexion a la base de données 
try {
    $monPdo = new PDO("mysql:$hostnom;dbname=$bdd;charset=utf8", $usernom, $password);
    $monPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
    $monPdo = null;
}
?>