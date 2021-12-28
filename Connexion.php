
<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=ale_hme_cinema;charset=utf8', 'root', '');

$req = $bdd->prepare('SELECT * FROM client WHERE email = :email AND password = :password');
$req->execute(array(
    'email'=>$_POST['email'],
    'password'=>$_POST['password']
));

$res = $req->fetch();

if($res){
    $_SESSION['email'] = $res['email'];
    $_SESSION['password'] = $res['password'];
    header('Location: index_logout.php');
}
else{
    header('Location: Connexion_form.php');

}
