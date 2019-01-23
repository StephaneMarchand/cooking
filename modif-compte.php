

<?php
require "header.php";

require "pdo.php";

if(!empty($_POST)){

	//modif new password crypté
	if ($_POST['password'] == '0b9c2625dc21ef05f6ad4ddf47c5f203837aa32c'){
		$login = $_POST['login'];
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$requete = "UPDATE membres SET password = '$password' WHERE login = '$login'";
		$req1 = $pdo->exec($requete);
	}
	$req = $pdo->prepare('SELECT * FROM membres WHERE login = ?');
	$req->execute(array($_POST['login']));
	$user = $req->fetch();

	if($user == null)
	{
		?>
		<div class="alert alert-danger" role="alert">
		  <strong>Erreur!</strong> Identifiant ou mot de passe incorrect.
		</div>
		<?php
	} 
	elseif(password_verify($_POST['password'], $user['password'])) //
	{

	$_SESSION['auth'] = $user;

	} 
	else 
	{
		?>
		<div class="alert alert-danger" role="alert">
		  <strong>Erreur!</strong> Identifiant ou mot de passe incorrect.
		</div>
		<?php
	}
}

if(isset($_SESSION['auth'])){
	?>
<div class="row liste_recettes justify-content-between"> 
	<div class="col-6">
		<h3 class="mt-3 ml-3">INFORMATION COMPTE</h3>

		<div class="auteur_recette mt-5 mb-2 photo_membre">	
			<span>Photo de profil : </span>
			<img src='photos/gravatars/<?php echo $_SESSION["auth"]["gravatar"]  ?>'>

	    </div>
	    <div class="auteur_recette login_membre mb-2">
	    	<button type="button" class="btn btn_search my-2 my-sm-0" aria-label="Left Align" onclick="appear('modif_login');">
				<i class="fas fa-edit"></i>
			</button>
			<span>Login : <?php echo $_SESSION["auth"]["login"]?></span>
			<div id="modif_login" style="display: none;">
				<input type="text" id="modif_newlogin" name="test">
				<input type="submit"  name="modif_login" onclick="updateInfos('<?php echo $_SESSION["auth"]["idMembre"] ?>','<?php echo $_SESSION["auth"]["login"] ?>','modif_newlogin','login')">
			</div>
		</div>

		<div class="auteur_recette mb-2">
			<button type="button" class="btn btn_search my-2 my-sm-0" aria-label="Left Align " onclick="appear('modif_prenom');">
				<i class="fas fa-edit"></i>
			</button>
			<span>Prénom : <?php echo $_SESSION["auth"]["prenom"]?></span>
			<div id="modif_prenom" style="display: none;">
				<input type="text" id="modif_newprenom" name="test">
				<input type="submit"  name="modif_login" onclick="updateInfos('<?php echo $_SESSION["auth"]["idMembre"] ?>','<?php echo $_SESSION["auth"]["prenom"] ?>','modif_newprenom','prenom')">
			</div>
		</div>

		<div class="auteur_recette mb-2">
			<button type="button" class="btn btn_search my-2 my-sm-0" aria-label="Left Align" onclick="appear('modif_nom');">
				<i class="fas fa-edit"></i>
			</button>
			<span>Nom : <?php echo $_SESSION["auth"]["nom"]?></span>
			<div id="modif_nom" style="display: none;">
				<input type="text" id="modif_newnom" name="test">
				<input type="submit"  name="modif_login" onclick="updateInfos('<?php echo $_SESSION["auth"]["idMembre"] ?>','<?php echo $_SESSION["auth"]["nom"] ?>','modif_newnom','nom')">
			</div>
		</div>
		
		<div class="auteur_recette mb-2">
			<span>Date d'inscription : <?php echo $_SESSION["auth"]["dateCrea"]?></span>
		</div>
		<div class="auteur_recette mb-2">
			<span>Statut : <?php echo $_SESSION["auth"]["statut"]?></span>
		</div>
		<?php
		$test=$pdo->prepare("SELECT * FROM recettes WHERE membre = ?");
			$test->execute(array($_SESSION["auth"]["idMembre"]));
			$recette = $test->fetchAll();
			if($recette === array()){
			    echo "
			    <span style='font-style: italic;'>Pas de recette pour le moment</span>"; 
			}else echo "
				<span style='font-style: italic;'>Recette en ligne :</span><br>";
			foreach ($recette as $chiffre => $valeur)  {
				 ?>
				<button type='button' class='btn btn_search my-2 my-sm-0' aria-label='Left Align' onclick="delete_recette('<?php echo "suppr_recette" . $valeur['idRecette'] ?>',);">
				<i class='far fa-trash-alt'></i>
				</button>
				<div id="<?php echo "suppr_recette" . $valeur['idRecette'] ?>" style="display: none;">
				<span>Supprimer la recette : <?php echo $valeur['titre'] ?></span>
				<input type="submit"  name="modif_login" onclick="delete_recette_ajax('<?php echo $_SESSION["auth"]["idMembre"] ?>',
				 '<?php echo $valeur['idRecette'] ?>','idRecette')">
			</div><?php echo"
				<a href='modif-recette.php?id=". $valeur['idRecette'] . "'> 
				<button type='button' class='btn btn_search my-2 my-sm-0' aria-label='Left Align' >
				<i class='fas fa-edit'></i>
			</button></a>

				<a href='recette.php?id=". $valeur['idRecette'] . "'> <span class='titre_recette'>" . $valeur['titre'] . "</span></a><br>" ;
			}
			?>
	</div>
	<div class="col-4">
		<a class="btn btn-outline-light" href="logout.php" role="button">Déconnexion</a>
	</div>
</div>

	<?php
}else{
?>


	<div class="row row-compte se-connecter">
		<h5>Se connecter</h5>
		<div class="w-100 d-none d-md-block"></div>
		<form method="POST" action="">
			<span>IDENTIFIANT : </span><div class="w-100 d-none d-md-block"></div>
			<input type="text" name="login" placeholder="login" size="45" required /><div class="w-100 d-none d-md-block"></div>
			<span>MOT DE PASSE : </span><div class="w-100 d-none d-md-block"></div><div class="w-100 d-none d-md-block"></div>
			<input type="text" name="password" placeholder="***" size="45" required /><div class="w-100 d-none d-md-block"></div>
			<div class="w-100 d-none d-md-block"></div>
			<input class="input_compte" type="submit" value="Se connecter" />
		</form>
		<div class="w-100 d-none d-md-block"></div>
		<div class="Inscrivez-vous">
			<h5>Pas encore membre?</h5><div class="w-100 d-none d-md-block"></div>
			<p><a href="inscription.php">Inscrivez-vous</a></p>
		</div>
	</div>



<?php

}
require "footer.php";

?>

<script type="text/javascript">

	function appear(idmodifie){
		let idmodifiee = '#' + idmodifie;
  		$(idmodifiee).show( "slow", function() {
	    // Animation complete.
	  	});
	}

	function delete_recette(idDelete){
		let idDeletee = '#' + idDelete;
  		$(idDeletee).show( "slow", function() {
	    // Animation complete.
	  	});
	}

	function updateInfos(idMembre,valeur,idModif,champs) {
            let idmodifie = '#' + idModif;

            let data = {
                script: "updateInfos",
                idMembre: idMembre,
                valeur: valeur,
                newValeur: $(idmodifie).val(),
                champs: champs,                
            }

            let request = $.post( "ajax.php", data);

		    request.done(function(result) {
		    	document.location.href="modif-valid.php";
		    });    
		    request.fail(function() {
		    	alert('pas ok');
		    });

        }

    function delete_recette_ajax(idMembre,valeur,champs) {
            //let idmodifie = '#' + idModif;

            let data = {
                script: "delete_recette_ajax",
                idMembre: idMembre,
                valeur: valeur,
                champs: champs,                
            }

            let request = $.post( "ajax.php", data);

            request.done(function(result) {
                document.location.href="modif-valid.php";
            });    
            request.fail(function() {
                alert('pas ok');
            });

        }
</script>
