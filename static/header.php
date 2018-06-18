<header>
	<a href="index.php" id="logo_site">
		<img src="img/chefs-hat.png" style="max-height: 15vh;" />
	</a>
	
	<a href="index.php" id="titre_site">
		<h1>MasterCook</h1>
	</a>
	
	<nav>
		<a href="index.php">Accueil</a>
		<a href="index.php?page=listeR.php">Recettes</a>
		<a href="index.php?page=listeIetP.php">Produits / Ingrédients</a>
		<a href="index.php?page=carte.php">Localisation</a>
		<?php
		if (isset($_SESSION['email'])) {
			echo '<a href="index.php?page=logout.php">Se déconnecter</a>';
		}
		else {
			echo '<a href="index.php?page=login.php">Se connecter</a>';
			echo '<a href="index.php?page=ajoutU.php">S\'inscrire</a>';
		}
		?>
	</nav>
</header>