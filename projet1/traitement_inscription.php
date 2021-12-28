<?php


$bdd = new PDO('mysql:host=localhost;dbname=ale_hme_cinema;charset=utf8',
'root', '');

$req = $bdd->prepare('SELECT * FROM client WHERE email = :email');
$req->execute(array(
    'email'=>$_POST['email'],
	'password'=>$_POST['password']
    ));

$res = $req->fetch();

if($res){
    echo 'compte existant';
    header('Location: index.php');
}
else{
$req = $bdd->prepare('INSERT INTO client (nom, prenom, email) VALUES (:nom, :prenom, :email)');
$req->execute(array(
	'nom'=>$_POST['nom'],
    'prenom'=>$_POST['prenom'],
	'email'=>$_POST['email'],
    'password'=>$_POST['password']
    ));
    /*echo 'Vous êtes inscrit';*/
    /*header('Location: connexion_form.php');*/
}
?>