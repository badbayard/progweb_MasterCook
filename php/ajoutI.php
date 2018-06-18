<div class="div_container listeIetPbox" id="ajoutI">
	<form class="form-horizontal col-lg-12" method="post" action="index.php?page=ajoutI.php">
		<div class="form-group">
			<legend>Saisie d'un ingredient</legend>
			<div class="row">
				<label for="text" class="col-md-3 col-md-offset-0 control-label">Nom de l'ingredient</label>
				<div class="input-group col-md-8">
					<input type="text" class="form-control" id="texte" name="Nom_ingredient">
				</div>
			</div>
			<div class="row">
				<label for="text" class="col-md-3 col-md-offset-0 control-label">Catégorie</label>
				<div class="input-group col-md-8">
					<select class="form-control" name="Categorie_ingredient">
						<?php
						$result = mysqli_query($connexion,'SELECT DISTINCT categorieIngredient FROM ingredient ORDER BY categorieIngredient ASC');
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<option>".$row['categorieIngredient']."</option>";
						}
						?>
						<option>Autre</option>
					</select>
				</div>
			</div>
			<div class="row">
				<label for="text" class="col-md-3 col-md-offset-0 control-label">Provenance</label>
				<div class="input-group col-md-8">
					<select for="text" class="form-control" name="Lieux">
						<?php 
						$result = mysqli_query($connexion,'SELECT pays FROM zonegeo ORDER BY pays ASC');
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<option>".$row['pays']."</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="row">
				<label for="date" class="col-md-3 col-md-offset-0 control-label">Date de provenance</label>
				<div class="input-group col-md-8">
					<input type="date" name="date" aria-required="true" aria-invalid="false" placeholder="jj/mm/aaaa" />
				</div>
			</div>
			<div class="row">
				<label for="qte" class="col-md-3 col-md-offset-0 control-label">Quantite disponible</label>
				<div class="input-group col-md-8">
					<input type="number" class="form-control" style="text-align:left" min="0" max="2000" name="qte_dispo">
				</div>
			</div>

			<hr>

			<div class="input-group col-md-2 col-md-offset-1">
				<div class="row">
					<input type="submit" class="btn btn-info" value="OK" href="index.php" name="OK" />
					<a href="index.php" class="btn btn-info" role="button">Annuler</a>
				</div>
			</div>
		</div>
	</form>
</div>

<div class="div_container listeIetPbox">
	<form class="form-horizontal col-lg-12" name="verif" method="post" action="index.php?page=ajoutI.php">
		<div class="row">
			<label for="Nom_produit" class="col-md-3 col-md-offset-0 control-label">Recherche d'un ingredient</label>
			<div class="input-group col-md-8">
				<input type='text' class="form-control" name='Nom_ingredient' />
			</div>
			<input type="submit" class="btn btn-info" value="Recherche" href="index.php" name="reach" />
		</div>
	</form>
</div>
	
<?php 
	mysqli_set_charset($connexion, "utf8");
	include('inc/functions.php');
	if (isset($_POST['OK'])) {
        $Nom_ingredient = $_POST['Nom_ingredient'];
        $Categorie_ingredient = $_POST['Categorie_ingredient'];
        $qte_dispo = $_POST['qte_dispo'];
                
        $sql1 = 'INSERT INTO ingredient (nomIngredient,categorieIngredient,quantiteIngredientDispo) VALUES("'.$Nom_ingredient.'","'.$Categorie_ingredient.'","'.$qte_dispo.'")';
        $req1 = mysqli_prepare($connexion,$sql1) or die ('ERREUR'.$sql1.'</br>'.mysql_error());
        mysqli_stmt_execute($req1);
	
		$sql2 = 'SELECT latitude, longitude FROM zonegeo WHERE pays = '.$_POST['Lieux'].' ';
		$resultat = mysqli_query($connexion,$sql2);
		$sqlprep = "INSERT INTO provient_de(nomIngredient,latitude,longitude,dateProvenance) VALUES (?,?,?,?)";
		if (!($reqprep = mysqli_prepare($connexion, $sqlprep))) {
			echo "Erreur de préparation (".mysqli_errno($connexion).") :".mysqli_error($connexion);
		}
		$latitude = $resultat['latitude'];
		$longitude = $resultat['longitude'];
        $Date_de_provenance = convertirDate($_POST['date'],'Y-m-d');
		mysqli_stmt_bind_param($reqprep,'ssss',$Nom_ingredient,$latitude,$longitude,$Date_de_provenance);
		mysqli_stmt_execute($reqprep);
		echo '<div class="div_container vert listeIetPbox"><p>Ingrédient '.$Nom_ingredient.' ajouté à la base de données !</p></div>';
	}

	if (isset($_POST['reach'])) { // Actionne la requête quand on appuie sur le bouton du formulaire 
		$Nom_ingredient = $_POST['Nom_ingredient'];
		$resultat = mysqli_query($connexion,'SELECT nomIngredient FROM ingredient WHERE nomIngredient = \''.$Nom_ingredient.'\'');
		if(mysqli_num_rows($resultat)==0)  // si la requete est vide alors le pseudo n'est pas bon 
		{
			echo '<div class="div_container"><p>L\'ingredient n\'est pas inscrit</p></div>';
		}
		else
		{
			echo '<div class="div_container"><p>L\'ingredient '.$Nom_ingredient.' est bien inscrit</p></div>';       // si la requête est trouver
		}
	}
?>