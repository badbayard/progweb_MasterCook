<?php

if(isset($_POST['OK'])) {
	$sql = "INSERT INTO recette(titre,categorieRecette,description,nbPersonnes,dateProposition) VALUES (?,?,?,?,NOW())";
	if(!($reqp = mysqli_prepare($connexion, $sql))) {
		echo "Erreur de préparation (".mysqli_errno($connexion).") :".mysqli_error($connexion);
	}
	else {
		$titreRecette = $_POST['titreRecette'];
		$categorieRecette = $_POST['categorieRecette'];
		$descriptionRecette = $_POST['descriptionRecette'];
		$nbPersonnes = $_POST['nbPersonnes'];
		mysqli_stmt_bind_param($reqp,"sssi",$titreRecette,$categorieRecette,$descriptionRecette,$nbPersonnes);
		mysqli_stmt_execute($reqp);
		echo '<div class="div_container vert"><p>La recette '.$titreRecette.' a bien été créée !</p></div>';
	}
}
?>

<div class="div_container">
<form class="form-horizontal col-lg-12" method="post" action="index.php?page=ajoutR.php">
	<div class="form-group">
		<legend>Créez votre recette !</legend>
		
		<div class="row">
			<label for="titreRecette" class="col-md-3 col-md-offset-0 control-label">Titre de la recette</label>
			<div class="input-group col-md-8">
				<input type="text" name="titreRecette" id="titreRecette" placeholder="Ex : Beignets de framboises" class="form-control" required />
			</div>
		</div>
		
		<div class="row">
			<label for="categorieRecette" class="col-md-3 col-md-offset-0 control-label">Catégorie de la recette</label>
			<div class="input-group col-md-8">
				<select name="categorieRecette" id="categorieRecette" class="form-control" required>
					<option>Entrée</option>
					<option>Plat</option>
					<option>Dessert</option>
					<option>Boisson</option>
				</select>
			</div>
		</div>
		
		<div class="row">
			<label for="descriptionRecette" class="col-md-3 col-md-offset-0 control-label">Description</label>
			<div class="input-group col-md-8">
				<textarea name="descriptionRecette" id="descriptionRecette" placeholder="Décrivez brièvement votre recette" class="form-control"></textarea>
			</div>
		</div>
		
		<div class="row">
			<label for="nbPersonnes" class="col-md-3 col-md-offset-0 control-label">Nombre de personnes</label>
			<div class="input-group col-md-8">
				<input type="number" name="nbPersonnes" id="nbPersonnes" min="1" class="form-control" />
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