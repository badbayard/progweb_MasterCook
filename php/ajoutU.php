<?php
if(isset($_POST['OK'])){
    //on récupère les valeurs entrées par l'utilisateur
    $Nom=$_POST['Nom'];
    $Prenom=$_POST['Prenom'];
    $Date_de_naissance=$_POST['Date_de_naissance'];
    $Genre=$_POST['Genre'];
    $Email=$_POST['E-mail'];
    $Pays=$_POST['Pays'];
    $Ville=$_POST['Ville'];
    $Code_postal=$_POST['Code_postal'];
    $Adresse=$_POST['Adresse'];
    
    $_SESSION['Nom']=$Nom;
    $_SESSION['Prenom']=$Prenom;
    $_SESSION['E-mail']=$Email;
    
    //on prepare la commande sql d'insertion

    $sql1='INSERT INTO utilisateur (nomUtilisateur,prenomUtilisateur,dateNaissance,genre,email,dateInscription) VALUES("'.$Nom.'","'.$Prenom.'","'.$Date_de_naissance.'","'.$Genre.'","'.$Email.'",NOW())';
    $sql2='INSERT INTO adresse (pays,ville,codePostal,adresse) VALUES("'.$Pays.'","'.$Ville.'","'.$Code_postal.'","'.$Adresse.'")';
    
    //on utilise mysqli_prepare sinon on met un message d'erreur si la requete ne marche pas
    
    $req1= mysqli_prepare($connexion,$sql1) or die('ERREUR sql avec le pseudo'.$sql.'</br>'.mysql_error());
    //exécute la commande préparer
    mysqli_stmt_execute($req1);
    
    $req2= mysqli_prepare($connexion,$sql2) or die('ERREUR sql avec le pseudo'.$sql.'</br>'.mysql_error());
    //exécute la commande préparer
    mysqli_stmt_execute($req2);   
    
}

?>	

<div class="div_container">
	<form class="form-horizontal col-lg-11" name="enregistrement" method="post" action="index.php">
	<div class="form-group">
		<legend>Saisie d'un utilisateur</legend>
		
		<div class="row">
			<label for="text" class="col-md-3 col-md-offset-1 control-label">Nom</label>
			<div class="input-group col-md-8">
				<input type="text" class="form-control" id="texte" name="Nom">
			</div>
		</div>
		
		<div class="row">
			<label for="text" class="col-md-3 col-md-offset-1 control-label">Prenom</label>
			<div class="input-group col-md-8">
				<input type="text" class="form-control" id="texte" name="Prenom" >
			</div>
		</div>
		
		<div class="row">
			<label for="qte" class="col-md-3 col-md-offset-1 control-label">Date de naissance</label>
			<div class="input-group col-md-8">
				<input type="date" aria-required="true" aria-invalid="false" placeholder="jj/mm/aaaa" name="Date_de_naissance" />
			</div>
		</div>
		
		<div class="row">
			<label for="text" class="col-md-3 col-md-offset-1 control-label">Genre</label>
			<div class="input-group col-md-8">
				<select class="form-control" name="Genre">
					<option>Homme</option>
					<option>Femme</option>
				</select>
			</div>
		</div>
		
		<div class="row">
			<label for="text" class="col-md-3 col-md-offset-1 control-label">E-mail</label>
			<div class="input-group col-md-8"  >
				<input type="text" class="form-control" id="texte" name="E-mail">
			</div>
		</div>
		<hr>
		
		<div class="row">
			<label for="text" class="col-md-3 col-md-offset-1 control-label">Pays</label>
			<div class="input-group col-md-8">
				<select class="form-control" name="Pays">
					<?php 
					$result = mysqli_query($connexion,'SELECT pays FROM zonegeo ORDER BY pays ASC');
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<option>".$row['pays']."</option>";
					}
					?>
				</select>
<!--				<input type="text" class="form-control" id="texte" name="Pays">-->
			</div>
		</div>
		
		<div class="row">
			<label for="text" class="col-md-3 col-md-offset-1 control-label">Ville</label>
			<div class="input-group col-md-8">
				<input type="text" class="form-control" id="texte" name="Ville">
			</div>
		</div>
		
		<div class="row">
			<label for="number" class="col-md-3 col-md-offset-1 control-label">Code Postal</label>
			<div class="input-group col-md-8">
				<input type="text" class="form-control" id="texte" name="Code_postal">
			</div>
		</div>
		
		<div class="row">
			<label for="text" class="col-md-3 col-md-offset-1 control-label">Adresse</label>
			<div class="input-group col-md-8">
				<input type="text" class="form-control" id="texte" name="Adresse">
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