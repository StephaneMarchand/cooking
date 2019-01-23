

<?php
require "header.php";

require "pdo.php";
	$newSession =$_SESSION['auth']['idMembre'];

    $req = $pdo->prepare('SELECT * FROM membres WHERE idMembre = ?');
            $req->execute(array($newSession));
            $user = $req->fetch();
            $_SESSION['auth'] = $user;
?>
<div class="row liste_recettes justify-content-between"> 
	<div class="col-6">
		<h3 class="mt-3 ml-3">INFORMATION COMPTE</h3>

		<div class="auteur_recette mt-5 mb-2 photo_membre">	
			<span>Modification enregistrée </span>
			<a href="mon-compte.php"><button type="button" class="btn btn_search my-2 my-sm-0" aria-label="Left Align" ">
			Retour Mon compte
			</button></a>

	    </div>
	    </div>
	    </div>





<?php


require "footer.php";

?>

