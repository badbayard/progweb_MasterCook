<?php session_start();
	include('inc/connexion.php');
//	include('inc/dataIntegration.php');
?>

<!DOCTYPE html>
<html>
<!-- 
Yannis HUTT			N° étudiant : 11408376
Randy ANDRIAMARO	N° étudiant : 11512256
-->
	<head>
		<meta charset="utf-8" />
		<title>MasterCook - Cuisines du monde</title>
		
		<!-- Liaison Bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- Liaisons de feuilles de style externe -->
		<!-- CSS de mise en page -->
		<link href="css/layout.css" rel="stylesheet" media="all" type="text/css">
		<!-- CSS de mise en forme -->
		<link href="css/custom.css" rel="stylesheet" media="all" type="text/css">
		<!-- CSS permettant l'adaptation à différentes tailles d'écran -->
		<link href="css/screen-responsive-stylesheet.css" rel="stylesheet" media="all" type="text/css">
		
		<!-- Image favicon (icône dans l'onglet du navigateur) -->
		<link href="img/chefs-hat-thumbnail.png" rel="shortcut icon" type="image/x-icon">
	</head>

	<body>
		<?php include('static/header.php'); ?>
		<main>
			<?php
				$nomPage = 'static/accueil.php';	// Page par défaut
				if(isset($_GET['page'])) {	// Vérification du paramètre page
						if(file_exists(addslashes('php/'.$_GET['page']))) { // le fichier existe
                    		$nomPage = addslashes('php/'.$_GET['page']);
						}
					}
				include($nomPage);
			?>
		</main>
		<?php include('static/footer.php'); ?>
	</body>

</html>

<?php
	include('inc/endConnexion.php');
?>