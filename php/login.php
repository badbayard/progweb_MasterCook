<?php 

if(isset($_POST['OK'])) {
	$req = "SELECT * FROM utilisateur WHERE (email,nomUtilisateur,prenomUtilisateur) = ('".$_POST['email']."','".$_POST['nom']."','".$_POST['prenom']."')";
	if(!mysqli_query($connexion,$req)) {
		echo '<div class="div_container erreur" >
				  <p><strong>Identifiants non reconnus</strong></p>
			  </div>';
	}
	else {
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['nom'] = $_POST['nom'];
		$_SESSION['prenom'] = $_POST['prenom'];
		echo '<div class="div_container vert" >
				  <p>Vous êtes connecté(e).</p>
				  <a href="index.php">Revenir à la page d\'accueil</a>
			  </div>';
	}
}
else {
?>

<div class="div_container">
	<form class="form-horizontal col-lg-12" method="post" action="index.php?page=login.php">
		<div class="form-group">
			<legend>Se connecter</legend>
			
			<div class="row">
				<label for="prenom" class="col-md-1 col-md-offset-2 control-label">Prenom</label>
				<div class="input-group col-md-8">
					<input type="text" name="prenom" id="prenom" placeholder="John" class="form-control" required />
				</div>
			</div>

			<div class="row">
				<label for="nom" class="col-md-1 col-md-offset-2 control-label">Nom</label>
				<div class="input-group col-md-8">
					<input type="text" name="nom" id="nom" placeholder="Doe" class="form-control" required />
				</div>
			</div>

			<div class="row">
				<label for="email" class="col-md-1 col-md-offset-2 control-label">Email</label>
				<div class="input-group col-md-8">
					<input type="text" name="email" id="email" placeholder="something@xyz.com" class="form-control" required />
				</div>
			</div>

			<hr>

			<div class="input-group col-md-2 col-md-offset-1">
            	<div class="row">
					<input type="submit" class="btn btn-info" value="Se connecter" href="index.php?page=login.php" name="OK" />
					<a href="index.php" class="btn btn-info" role="button">Annuler</a>
				</div>
			</div>
		</div>
	</form>
</div>

<?php
}
?>