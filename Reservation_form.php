<!DOCTYPE html>
<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=ale_hme_cinema;charset=utf8',
    'root', '');
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
    <title>Reservation</title>

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
	<form method="post" action="">
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Reservation</h2>
                        <div class="input-group">
                            <label class="input--style-3"">Choisir un film</label><br /><select name="film" id="film">
                                <option></option>
                                <?php
                                $req = $bdd->query('SELECT * FROM film');
                                while($data = $req->fetch()){
                                ?>
                                <option value="<?php $data['id_film'];?>"><?php echo $data['titre'];?> </option>
                                <?php
                                } // Fin de la boucle qui liste les statut.
                                ?>
                            </select>
                        </div>
                        <div class="input-group">
                            <label class="input--style-3">Choisir une salle</label><br /><select name="salle" id="salle">
                                <option></option>
                                <?php
                                $req = $bdd->query('SELECT * FROM salle');
                                while($data = $req->fetch()){
                                ?>
                                <option value="<?php $data['id_salle'];?>"><?php echo $data['nom'];?> </option>
                                <?php
                                } // Fin de la boucle qui liste les statut.
                                ?>
                            </select>
                        </div>
                        <div class="input-group">
                            <label class="input--style-3">Choisir un moyen de payment</label><br />
                            <select name="payment" placeholder="Choisir un moyen de payment" id="payment">
                                <option></option>
                                <option value="cb">CB</option>
                                <option value="paypal">Paypal</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label class="input--style-3">Nombres de personnes</label><br />
                            <input type="number" name="nb_place" >
                        </div>
                        <div class="input-group">
                            <label class="input--style-3">Choisir une date</label><br />
                            <input type="date" id="start" name="trip-start"
                                   value="2022-01-01"
                                   min="2022-01-01" max="2022-03-31">
                        </div>
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="submit">Valider</button>
                        </div>
						<div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="reset">Annuler</button>
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