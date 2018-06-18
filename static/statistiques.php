<aside class="div_container" id="stats">
	<h2>Base de données</h2>
	<hr>
	<?php 
		$result = mysqli_prepare($connexion,'SELECT * FROM ingredient');
		mysqli_stmt_execute($result);
		$a = 0;
		while(mysqli_stmt_fetch($result))
		{
			$a += 1;
		}
		echo "<p>";
		printf("Nombre d'ingrédients : <strong>%s</strong>",$a);
		echo "</p>";
		
		$result2 = mysqli_prepare($connexion,'SELECT * FROM produit');
		mysqli_stmt_execute($result2);
		$b = 0;
		while(mysqli_stmt_fetch($result2))
		{
			$b += 1;
		}
		echo "<p>";
		printf("Nombre de produit : <strong>%s</strong>",$b);
		echo "</p>";
		
		$result3 = mysqli_prepare($connexion,'SELECT * FROM recette');
		mysqli_stmt_execute($result3);
		$c = 0;
		while(mysqli_stmt_fetch($result3))
		{
			$c += 1;
		}
		echo "<p>";
		printf("Nombre de recettes répertoriées : <strong>%s</strong>",$c);
		echo "</p>";
	?>
</aside>