<?php

require "header.php";

require "pdo.php";


?>
<div class="row liste_recettes">
	<h3>Recettes par catégories</h3><div class="w-100"></div>
	<div class="categories">
		<a href="#viande">Viandes </a>|
		<a href="#legume">Légumes </a>|
		<a href="#poisson">Poissons </a>|
		<a href="#fruit">Fruits</a>
	</div>

	<h5 style="text-align: center !important;width: 100%;" id="viande">Viandes</h5>
	<div class="row" style="text-align: center;">
		<?php 
		$resultats=$pdo->query("SELECT titre, img, idRecette FROM recettes, categories WHERE nom = 'viande' AND idCategorie = categorie");
		$ligne = $resultats->fetchAll();
		//verification de l'absence de données
		if($ligne === array()){
		    echo "<h4 style='color: blue;text-align: center;'>Pas de recette pour le moment</h4>"; 
		}
		foreach ($ligne as $key => $value) {
			echo "<div class='col-md-3 col-sm-6 recette_titre'>"
			 . "<a href='recette.php?id=". $value[2] . "'><span class='titre_recette'>" . $value[0] . "</span></a>" .
			 "<a href='recette.php?id=". $value[2] . "'><img class='recettejour' src=photos/recettes/". $value[1] ."></a>" .
			 "</div>";
		}$resultats->closeCursor();

		?>
	</div>

	<h5 style="text-align: center !important;width: 100%;" id="legume">Légumes</h5>
	<div class="row" style="text-align: center;">
		<?php

		$resultats=$pdo->query("SELECT titre, img, idRecette FROM recettes WHERE categorie = 2");
		$ligne = $resultats->fetchAll();
		//verification de l'absence de données
		if($ligne === array()){
		    echo "<h4 style='color: blue;text-align: center;'>Pas de recette pour le moment</h4>"; 
		}
		foreach ($ligne as $key => $value) {
			echo "<div class='col-md-3 col-sm-6 recette_titre'>"
			 . "<a href='recette.php?id=". $value[2] . "'><span class='titre_recette'>" . $value[0] . "</span></a>" .
			 "<a href='recette.php?id=". $value[2] . "'><img class='recettejour' src=photos/recettes/". $value[1] ."></a>" .
			 "</div>";
		}$resultats->closeCursor();

			?>
	</div>

	<h5 style="text-align: center !important;width: 100%;" id="poisson">Poissons</h5><div class="w-100"></div>
	<div class="row" style="text-align: center;">
		<?php 

		$resultats=$pdo->query("SELECT titre, img, idRecette FROM recettes WHERE categorie = 3");
		$ligne = $resultats->fetchAll(); 
		//verification de l'absence de données
		if($ligne === array()){
		    echo "<h4 style='color: blue;text-align: center;'>Pas de recette pour le moment</h4>"; 
		}
		foreach ($ligne as $key => $value) {
			echo "<div class='col-md-3 col-sm-6 recette_titre'>"
			 . "<a href='recette.php?id=". $value[2] . "'><span class='titre_recette'>" . $value[0] . "</span></a>" .
			 "<a href='recette.php?id=". $value[2] . "'><img class='recettejour' src=photos/recettes/". $value[1] ."></a>" .
			 "</div>";
			 $resultats->closeCursor();
		}

		?>
	</div>

	<h5 style="text-align: center !important;width: 100%;" id="fruit">Fruit</h5><div class="w-100"></div>
	<div class="row" style="text-align: center;">
		<?php
		$resultats=$pdo->query("SELECT titre, img, idRecette FROM recettes WHERE categorie = 4");
		$ligne = $resultats->fetchAll(); 
		//verification de l'absence de données
		if($ligne === array()){
		    echo "<span style='margin-left: 200px;'>Pas de recette pour le moment</span>"; 
		}
		foreach ($ligne as $key => $value) {
			echo "<div class='col-md-3 col-sm-6 recette_titre'>"
			 . "<a href='recette.php?id=". $value[2] . "'><span class='titre_recette'>" . $value[0] . "</span></a>" .
			 "<a href='recette.php?id=". $value[2] . "'><img class='recettejour' src=photos/recettes/". $value[1] ."></a>" .
			 "</div>";
		}
		$resultats->closeCursor();



		?>
	</div>
</div>

<?php

require "footer.php";

?>