<div id="sousmenu">
	<ul>
		<li>
			<a href="#listeI"><p>Liste ingrédients</p></a>
		</li>
		<li>
			<a href="#listeP"><p>Liste produits</p></a>
		</li>
		<li>
			<a href="#ajoutI"><p>Ajouter un ingrédient</p></a>
		</li>
		<li>
			<a href="#ajoutP"><p>Ajouter un produit</p></a>
		</li>
	</ul>
</div>

<div class="div_container listeIetPbox" id="listeI">
	<h2>Ingrédients</h2>
	
	<hr>
	
	<table class="table table-bordered table-condensed table-hover">
		<caption>Liste des ingrédients répertoriés</caption>
		<tr>
			<th>Nom</th>
			<th>Catégorie</th>
			<th>Quantité disponible</th>
			<th>Date de production</th>
			<th colspan="2">Origine</th>
		</tr>
		<?php 
			mysqli_set_charset($connexion, "utf8");
			$result = mysqli_prepare($connexion,'SELECT ingredient.*, dateProvenance, continent, pays FROM (ingredient NATURAL JOIN provient_de) NATURAL JOIN zonegeo');
			mysqli_stmt_execute($result);
			mysqli_stmt_bind_result($result,$nomI,$categorieI,$qteI,$dateI,$continentI,$paysI);
			while(mysqli_stmt_fetch($result))
			{
				echo "<tr>
						<td>".$nomI."</td>
						<td>".$categorieI."</td>
						<td>".$qteI."</td>
						<td>".$dateI."</td>
						<td>".$continentI."</td>
						<td>".$paysI."</td>
					  </tr>";
			}
			mysqli_stmt_close($result);
//			mysql_free_result($result);
		?>
	</table>
</div>

<div class="div_container listeIetPbox" id="listeP">
	<h2>Produits</h2>
	
	<hr>
	
	<table class="table table-bordered table-condensed table-hover">
		<caption>Liste des produits répertoriés</caption>
		<tr>
			<th>Nom</th>
			<th>Catégorie</th>
			<th>Quantité disponible</th>
			<th>Date de production</th>
			<th colspan="2">Origine</th>
		</tr>
		<?php 
			mysqli_set_charset($connexion, "utf8");
			$result = mysqli_prepare($connexion,'SELECT nomProduit, categorieProduit, quantiteProduitDispo, dateFabrication, continent, pays FROM produit NATURAL JOIN zonegeo');
			mysqli_stmt_execute($result);
			mysqli_stmt_bind_result($result,$nomP,$categorieP,$qteP,$dateP,$continentP,$paysP);
			while(mysqli_stmt_fetch($result))
			{
				echo "<tr>
						<td>".$nomP."</td>
						<td>".$categorieP."</td>
						<td>".$qteP."</td>
						<td>".$dateP."</td>
						<td>".$continentP."</td>
						<td>".$paysP."</td>
					  </tr>";
			}
			mysqli_stmt_close($result);
		?>
	</table>
</div>

<?php include('php/ajoutI.php'); ?>
<?php include('php/ajoutP.php'); ?>