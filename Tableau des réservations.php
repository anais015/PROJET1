<!doctype html>
<html lang="fr">
  <head>
  	<title> Tableau des réservations </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<form action="post">
	<?php
$bdd = new PDO('mysql:host=localhost;dbname=ale_hme_cinema;charset=utf8','root', '');

$req = $bdd->prepare('SELECT * FROM reservation');
$req->execute(array(
	'id_reservation'=>$_POST['id_reservation'],
	'nb_place'=>$_POST['nb_place'],
	'payment'=>$_POST['payment'],
	'date'=>$_POST['date'],
	'ref_client'=>$_POST['ref_client'],
	'ref_salle'=>$_POST['ref_salle']
));

$res = $req->fetchall();
?>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Liste des réservations</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h4 class="text-center mb-4"></h4>
					<div class="table-wrap">

						<table class="table">
						
					    <thead class="thead-primary">
					      <tr>
							  <th>id_reservation</th>
							  <th>Nombre de place</th>
							  <th>Moyen de paiement</th>
					       	  <th>id_client</th>
							  <th>id_salle</th>
							  <th>Correction</th>
					      </tr>
					    </thead>
					    <tbody>
					      <?php
							 foreach($res as $value){
							  echo "<tr><th>".$value['id_reservation']."</th><td>".$value['nb_place']."</td><td>"
							  .$value['payment']."</td><td>".$value['date_reservation']."</td><td>".$value['ref_client']."</td><td>"
							  .$value['ref_salle']."</td><td> <input type='button' value='Modifier' class='btn btn-primary' href='#'></td>
						</tr>"; } ?>
					      <!-- <tr>
					        <th scope="row" class="scope" ></th>
					       
					        <td><input type="button" value="Modifier" class="btn btn-primary" href="#"></td>
					      </tr>
					      <tr>
					        <th scope="row" class="scope" ></th>
					        
					        <td><input type="button" value="Modifier" class="btn btn-primary" href="#"></td>
					      </tr>
					      <tr>
					        <th scope="row" class="scope" ></th>
					        
					        <td><input type="button" value="Modifier" class="btn btn-primary" href="#"></td>
					      </tr>
					      <tr>
					        <th scope="row" class="scope" ></th>
					        
					        <td><input type="button" value="Modifier" class="btn btn-primary" href="#"></td>
					      </tr>
					      <tr>
					        <th scope="row" class="scope border-bottom-0"></th>
					        <td class="border-bottom-0"></td>
							  
					        <td class="border-bottom-0"><input type="button" value="Modifier" class="btn btn-primary" href="#"></td>
					      </tr> -->
						</tbody>
						
					  </table>

					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
		</form>
	</body>
</html>

