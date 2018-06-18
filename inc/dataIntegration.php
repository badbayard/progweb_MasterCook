<?php 
	include('inc/functions.php');
	$sql1 = "SELECT emailAdresse, nom, prenom, dateNaissance 
			 FROM personnesbdw1 
			 GROUP BY emailAdresse;";
	if(!($result = mysqli_query($connexion,$sql1))) {
		echo "<p>Erreur dans la collecte des données dans personnesbdw1</p>";
		exit();
	}	/* Message d'erreur */
	$sql2 = "UPDATE Utilisateur 
			 SET dateNaissance = ? 
			 WHERE (email,nomUtilisateur,prenomUtilisateur) = (?,?,?)";
	if(!($reqp = mysqli_prepare($connexion, $sql2))) {
		echo "Erreur de préparation (".mysqli_errno($connexion).") :".mysqli_error($connexion);
		exit();
	}	/* Message d'erreur */
	$date = '';
	$email = '';
	$nom = '';
	$prenom = '';
	mysqli_stmt_bind_param($reqp,"ssss",$date,$email,$nom,$prenom);
	while ($result_row = mysqli_fetch_assoc($result)) {
		$date = convertirDate($result_row['dateNaissance'],'Y-m-d');
		$email = $result_row['emailAdresse'];
		$nom = $result_row['nom'];
		$prenom = $result_row['prenom'];
		mysqli_stmt_execute($reqp);
	}
?>