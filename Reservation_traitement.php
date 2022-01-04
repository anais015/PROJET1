<?php
session_start()

$bdd = new PDO('mysql:host=localhost;dbname=ale_hme_cinema;charset=utf8',
    'root', '');
$req = $bdd->prepare('INSERT INTO client ()WHERE email = :email');
$res = 
?>
