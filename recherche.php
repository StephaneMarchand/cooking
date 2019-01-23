<?php

require "header.php";

require "pdo.php";

?>
<div class="row" style="margin-top: 20px; margin-right: -30px;margin-left: -30px;">

<?php

if(!empty($_POST)){
	$_POST['terme'] = htmlspecialchars($_POST['terme']);
	$terme = $_POST['terme'];
 	$terme = trim($terme); //pour supprimer les espaces dans la requête de l'internaute
 	$terme = strip_tags($terme); //pour supprimer les balises html dans la requête
	$terme = strtolower($terme);
  	$select_terme = $pdo->prepare("SELECT * FROM recettes WHERE titre LIKE ? OR chapo LIKE ?");
  	$select_terme->execute(array("%".$terme."%", "%".$terme."%"));
	$resultat_recherche = TRUE;
  	while($terme_trouve = $select_terme->fetch()){
		$resultat_recherche = FALSE;
	  	echo 
		"<div class='col-md-4'>
			<div class='cadre_recette_jour'>
				<h5><a href='recette.php?id=". $terme_trouve['idRecette']  . "'><span class='titre_recette'>" . $terme_trouve['titre'] . "</span></a></h5>" .
				"<a href='recette.php?id=". $terme_trouve['idRecette']   . "'><img class='recettejour' src=photos/recettes/".$terme_trouve['img']."></a>" . 
				"<p>" . $terme_trouve['chapo'] . "</p>
			</div>
		</div>";
    }
    echo "</div>";
    if($resultat_recherche == TRUE){
    	echo "<div class='row_membre' style='margin-right: -15px;margin-left: -15px;'>
    <h3>Aucune recette trouvé</h3>
  </div>";
  $select_terme->closeCursor();
    }
}
?>

<?php

require "footer.php";

?>