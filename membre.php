<?php

require "header.php";

require "pdo.php";

?>
<div class="row row_membre liste_recettes" >
	<h3 style="text-align: center;width: 100%;">MEMBRES</h3><div class="w-100"></div>
		<?php

		$resultats=$pdo->query("SELECT * FROM membres");
		$ligne = $resultats->fetchAll();
		
		foreach ($ligne as $key => $value) {
			echo 
			"<div class='col-md-4 col-sm-6 test'>
				<div class='cadre_membre'>
			 	<span class='nom_prenom_membre'>" . $value['prenom'] . " </span>
				<span class='nom_prenom_membre'>" . $value['nom'] . "</span><br>
				<img class='gravatar' src=photos/gravatars/". $value['gravatar'] ."><br>";
			$membreId = $value['idMembre'];
			$test=$pdo->prepare("SELECT * FROM recettes WHERE membre = ?");
			$test->execute(array($membreId));
			$recette = $test->fetchAll();
			if($recette === array()){
			    echo "
			    <span style='font-style: italic;'>Pas de recette pour le moment</span>"; 
			}else echo "
				<span style='font-style: italic;'>Recette en ligne :</span><br>";
			foreach ($recette as $chiffre => $valeur)  {
				echo "
				<a href='recette.php?id=". $valeur['idRecette'] . "'><span class='titre_recette'>" . $valeur['titre'] . "</span></a><br>" ;
			}
			echo "
				</div>
			</div>";
		}
$resultats->closeCursor();
		?>
</div>



<?php

require "footer.php";

?>