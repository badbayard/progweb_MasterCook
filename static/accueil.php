<!-- Description du site :
Répertorie ingrédients, produits, localisations
Partage recettes -->
<div class="div_container">
	<?php 
	if(isset($_SESSION['email'])) {
		echo "<h2>Bonjour ".$_SESSION['prenom']." !</h2>";
	}
	else {
		echo "<h2>Bienvenue, cuisiniers en herbe !</h2>";
	}
	?>
	<hr>
	<p>
		Le site est conçu pour permettre de partager les recettes de cuisine au plus grand nombre de personnes.
	</p>
	<p>
		Il permet aussi d'établir des listes de recettes et d'ingrédients.
	</p>
</div>

<?php include('static/statistiques.php'); ?>