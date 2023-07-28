<?php

// Un joli site avec un beau h1 et un beau p
echo '<h1>Mon joli site</h1>';
echo '<p>Un joli php'.phpversion().'</p>';
echo '<img style="width: 100px; height: 100%;" src="asset/SPM_CesarPalace_BravoBrian.jpg" alt="BOUM">';


// Une belle connexion pdo

$user = 'root';
$pass = 'jjj123';
$mySqlServer = 'db:3306';
$mySqlDatabase = 'test';
try {
    $mysql = new PDO(
        "mysql:host=$mySqlServer;dbname=$mySqlDatabase;charset=utf8",
        $user,
        $pass,
        array(PDO::ATTR_PERSISTENT => true));
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}