<?php
// connexion
$servername = 'localhost';
$username = 'root';
$password = '';

try {
    $bdd = new PDO("mysql:host=$servername;dbname=rando", "$username", "$password");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "erreur : " . $e->getMessage();
}
?>