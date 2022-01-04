<!DOCTYPE html>
<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=ale_hme_cinema;charset=utf8',
    'root', '');

$req = $bdd->prepare('SELECT * FROM client WHERE email = :email');
$req->execute(array(
    'email'=>$_SESSION['email'],
));
$res = $req->fetch();
$email = $res ['email'];
$nom = $res ['nom'];
$prenom = $res ['prenom'];
?>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Modification</title>

    <!-- Icons font CSS-->
    <link href="colorlib-regform-3/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="colorlib-regform-3/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="colorlib-regform-3/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="colorlib-regform-3/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
<form method="POST" action="">
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Modification</h2>
                    <div class="input-group">
                        <input class="input--style-3" type="text" value="<?php echo $nom; ?>" name="nom">
                    </div>
                    <div class="input-group">
                        <input class="input--style-3" type="text" value="<?php echo $prenom; ?>" name="prenom">
                    </div>
                    <div class="input-group">
                        <input class="input--style-3" type="email" value="<?php echo $email; ?>" name="email">
                    </div>
                    <div class="input-group">
                        <input class="input--style-3" type="password" placeholder="password" name="password">
                    </div>
                    <div class="p-t-10">
                        <button class="btn btn--pill btn--green" type="submit" name="valider">Valider</button>
                    </div>
                    <div class="p-t-10">
                        <button class="btn btn--pill btn--green" type="reset" name="effacer">Effacer</button>
                    </div>
</form>
</div>
</div>
</div>
</div>

<!-- Jquery JS-->
<script src="vendor/jquery/jquery.min.js"></script>
<!-- Vendor JS-->
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/datepicker/moment.min.js"></script>
<script src="vendor/datepicker/daterangepicker.js"></script>

<!-- Main JS-->
<script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
<?php
if(isset($_POST['valider'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $req = $bdd->prepare('UPDATE client SET nom=:nom, prenom=:prenom, email=:email, password=:password');
    $req_exe = $req->execute(array(
        'nom'=>$nom,
        'prenom'=>$prenom,
        'email'=>$email,
        'password'=>$password
    ));
    if ($req_exe){
        header('Location:index_logout.php');
        echo '<script>alert("Updated")</script>';
    }
    else {
        echo '<script>alert("Not Updated")</script>';
        header('Location: update_user_form.php');
    }

}

?>