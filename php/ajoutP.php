<?php 
mysqli_set_charset($connexion, "utf8");
if(isset($_POST['OK'])){
	$sql1 = "INSERT INTO produit(nomProduit,categorieProduit,quantiteProduitDispo,dateFabrication,latitude,longitude) VALUES(?,?,?,?,?,?)";
	$req1 = mysqli_prepare($connexion,$sql1) or die ('ERREUR'.$sql1.'</br>'.mysql_error());
	$Nom_produit = $_POST['Nom_produit'];
	$Categorie_du_produit = $_POST['Categorie_du_produit'];
	$qte1 = $_POST['qte1'];
	$date = date('Y-m-d',strtotime($_POST['date']));
	$row = mysqli_query($connexion,'SELECT latitude, longitude FROM zonegeo WHERE pays = \''.$_POST['Lieux'].'\'');
	$res = mysqli_fetch_assoc($row);
	$latitude = $res['latitude'];
	$longitude = $res['longitude'];
	mysqli_stmt_bind_param($req1,'ssisss',$Nom_produit,$Categorie_du_produit,$qte1,$date,$latitude,$longitude);
	mysqli_stmt_execute($req1);
	mysqli_query($connexion,'INSERT INTO est_fait_de(nomProduit,nomIngredient) VALUES (\''.$Nom_produit.'\',\''.$_POST['ing1'].'\')');
	mysqli_query($connexion,'INSERT INTO est_fait_de(nomProduit,nomIngredient) VALUES (\''.$Nom_produit.'\',\''.$_POST['ing2'].'\')');
	echo '<div class="div_container vert listeIetPbox"><p>Produit '.$Nom_produit.' ajouté à la base de données !</p></div>';
}
?>


<div class="div_container listeIetPbox" id="ajoutP">
<form class="form-horizontal col-lg-11"method="post" action="index.php?page=ajoutP.php">
    <div class="form-group">
<legend>Saisie d'un produit</legend>
        
                <div class="row">
            <label for="text" class="col-md-3 col-md-offset-1 control-label">Nom du produit</label>
            <div class="input-group col-md-8">
            <input type="text" class="form-control" id="texte" name="Nom_produit">
            </div>
        </div>
        
                <div class="row">
            <label for="text" class="col-md-3 col-md-offset-1 control-label">Catégorie</label>
            <div class="input-group col-md-8">
                <select class="form-control" name="Categorie_du_produit">
						<?php
						$result = mysqli_query($connexion,'SELECT DISTINCT categorieProduit FROM produit ORDER BY categorieProduit ASC');
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<option>".$row['categorieProduit']."</option>";
						}
						?>
                    <option>Frais</option>
                    <option>Surgele</option>
                    <option>Boite de conserve</option>
                </select>
            </div>
        </div>
        
        <div class="row">
            <label for="text" class="col-md-3 col-md-offset-1 control-label">Lieu de fabrication</label>
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
            <label for="qte" class="col-md-3 col-md-offset-1 control-label">Date de fabrication</label>
            <div class="input-group col-md-8">
                <input type="date" name="date" aria-required="true" aria-invalid="false" placeholder="jj/mm/aaaa" />
            </div>
        </div>
        
        <div class="row">
            <label for="qte" class="col-md-3 col-md-offset-1 control-label">Quantité disponible</label>
            <div class="input-group col-md-8">
                <input type="number" class="form-control" style="text-align:left" min="0" max="2000" name="qte1">
            </div>
        </div>

		<hr>
        
        <div class="row">
            <label for="text" class="col-md-3 col-md-offset-1 control-label">Ingredient 1</label>
                <div class="input-group col-md-8">
					<select for="text" class="form-control" name="ing1">
						<?php 
						$result = mysqli_query($connexion,'SELECT nomIngredient FROM ingredient ORDER BY nomIngredient ASC');
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<option>".$row['nomIngredient']."</option>";
						}
						?>
					</select>
                </div>
        </div>
        
        <div class="row">
            <label for="text" class="col-md-3 col-md-offset-1 control-label">Ingredient 2</label>
                <div class="input-group col-md-8">
					<select for="text" class="form-control" name="ing2">
						<?php 
						$result = mysqli_query($connexion,'SELECT nomIngredient FROM ingredient ORDER BY nomIngredient ASC');
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<option>".$row['nomIngredient']."</option>";
						}
						?>
					</select>
                </div>
        </div>
		
		<hr>

        <div class="input-group col-md-2 col-md-offset-1">
            <div class="row">
                <input type="submit" class="btn btn-info" value="OK" href="index.php?page=P.php" name="OK" />
                <a href="index.php" class="btn btn-info" role="button">Annuler</a>
            </div>
        </div>
    </div>
</form>
</div>