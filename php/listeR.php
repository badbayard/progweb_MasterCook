<div class="div_container">
	<h2>Recettes</h2>
	
	<hr>
	
	<table class="table table-bordered table-condensed table-hover">
		<caption>Liste des recettes répertoriées</caption>
		<tr>
			<th>Titre</th>
			<th>Catégorie</th>
			<th>Description</th>
			<th>Nombre de personnes</th>
			<th>Proposée par</th>
			<th>Date de proposition</th>
		</tr>
		
<?php
	mysqli_set_charset($connexion, "utf8");
	$sql = "SELECT * FROM recette";
	if(!($result = mysqli_query($connexion,$sql))) {
		echo "<p>Erreur : les recettes ne peuvent pas être affichées</p>";
		exit();
	}
	while ($result_row = mysqli_fetch_assoc($result)) {
		echo	"<tr>
					<td>".$result_row['titre']."</td>
					<td>".$result_row['categorieRecette']."</td>
					<td>".$result_row['description']."</td>
					<td>".$result_row['nbPersonnes']."</td>
					<td>".$result_row['email']."</td>
					<td>".$result_row['dateProposition']."</td>
				</tr>";
	}
?>

	</table>
</div>

<?php include('php/ajoutR.php');