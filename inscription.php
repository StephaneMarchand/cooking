<?php

require "header.php";

require "pdo.php";

?>


	<div class="row row-compte s-inscrire">
		<h5>Pas encore membre?</h5>
		<div class="w-100 d-none d-md-block"></div>
		<form method="POST" action="">
			<!-- div si les champs ne sont pas correctement rentrés  
			<?php if(!empty($errors)): ?>
				<div class="alert_inscription">
					<p>! Vous n'avez pas rempli les champs correctement :</p>
					<ul>
						<?php foreach($errors as $error): ?>
						<li><?= $error; ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?> -->

			<span>LOGIN<em>*</em></span><div class="w-100 d-none d-md-block"></div>
				<input type="text" name="login" size="45" /><div class="w-100 d-none d-md-block"></div>

			<span>NOM<em>*</em></span><div class="w-100 d-none d-md-block"></div>
				<input type="text" name="nom" size="45" /><div class="w-100 d-none d-md-block"></div>

			<span>PRENOM<em>*</em></span><div class="w-100 d-none d-md-block"></div>
				<input type="text" name="prenom" size="45" /><div class="w-100 d-none d-md-block"></div>
			



			<span>ENTREZ VOTRE MOT DE PASSE<em>*</em></span><div class="w-100 d-none d-md-block"></div>
				<input type="password" name="password" size="45" /><div class="w-100 d-none d-md-block"></div>
			

			<input class="input_compte" type="submit" value="Créer un nouveau compte" />
		


<?php
if(!empty($_POST))
{
	$errors = array();
	//verification de la conformité du pseudo
	if(empty($_POST['login']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['login']) || (filter_input(INPUT_POST, $_POST['login'], FILTER_DEFAULT , FILTER_SANITIZE_STRING) != FALSE)) // 
	{
		$errors['login'] = "Votre login n'est pas valide";
	} 
	else 
	{
		$req = $pdo->prepare('SELECT * FROM membres WHERE login = ?');
		$req->execute([$_POST['login']]);
		$user = $req->fetch();
		if($user)
		{
			$errors['login'] = "Ce login est déjà utilisé";
		}
	}
	if(empty($_POST['nom']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['nom']) || (filter_input(INPUT_POST, $_POST['login'], FILTER_DEFAULT , FILTER_SANITIZE_STRING) != FALSE)) 
	{
		$errors['nom'] = "Votre nom n'est pas valide";
	} 
	if(empty($_POST['prenom']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['prenom']) || (filter_input(INPUT_POST, $_POST['login'], FILTER_DEFAULT , FILTER_SANITIZE_STRING) != FALSE)) 
	{
		$errors['prenom'] = "Votre prenom n'est pas valide";
	} 
	
	//vérification de la conformité du mot de passe

	

// Insertion des données des membres
	if(empty($errors))
	{
	$req = $pdo->prepare('INSERT INTO membres (gravatar, login, password, statut,  nom, prenom) VALUES(?, ?, ?, ?, ?, ?)');
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$req->execute(array('natha.png', $_POST['login'], $password, 'membre', $_POST['nom'], $_POST['prenom']));
	$req->closeCursor();

	$req = $pdo->prepare('SELECT * FROM membres WHERE login = ?');
	$req->execute(array($_POST['login']));
	
	$user = $req->fetch();
	$_SESSION['auth'] = $user;
	?>
	<div class="alert alert-light" role="alert">
  		Inscription validée
  		<a href="index.php">
  			<button type="button" class="btn btn_search my-2 my-sm-0" aria-label="Left Align">
  			OK
			</button>
		</a>
	</div>
	<?php
	}
}
 ?>
 </form>
	</div>

 <?php
require "footer.php";

?>