<?php if(session_status() == PHP_SESSION_NONE)
	{
        session_start();
    } ?>
<!DOCTYPE html>
<html>
<head>
	<title>Cooking</title><meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<script src="js/jquery.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

	<div class="container">
		<header>
		<div class="row ">
		
			<div class="col col-md-4 col-lg-3 logo d-none d-md-block">
				<a href="index.php"><img class="img-fluid" src="images/logo-cooking.png" alt="logo-cooking"></a>
				<!--<span class="navbar-toggler-icon"></span>-->
			</div>
			<div class="col col-lg-5 col-md-5 col-sm-10">
				<form class="form-inline my-2 my-lg-0" action="recherche.php" method="POST">
	      			<input class="form-control col-10 col-md-9 col-sm-10  mr-sm-2" type="text" placeholder="Chercher: burger, pizza, etc..." aria-label="Rechercher" id="search_string" name="terme" value="" required="">
	      			<button class="btn btn_search my-2 my-sm-0" type="submit" name="sa" style="border-radius: 4px;">
	      			<i class="fas fa-search"></i>
			    </form>
			</div>
			<div class="col col-lg-3 col-md-2 col-2">
				<div class="d-block d-md-none"><a class="btn btn-outline-light" href="#" role="button"><i class="fas fa-user"></i></a></div>
				<div class="d-none d-md-block"><a class="btn btn-outline-light" href="mon-compte.php" role="button">Mon compte</a></div>
				<div class="d-none d-md-block" style="margin-top: 2px;">
					<?php
					if(isset($_SESSION['auth'])){
					?>
						<a class="btn btn-outline-light " href="deposer-recette.php" role="button">Déposer recette</a>
					<?php
					}else{
					?>
						<a class="btn btn-outline-light " href="mon-compte.php" role="button">Déposer recette</a>
					<?php
					}
					?>
				</div>
			</div>
			<div class="col d-none d-lg-block col-lg-1">
				<div class="row">
					<a class="reseau" href="#"><img src="images/youtube.png" alt="youtube"></a>
					<a class="reseau" href="#"><img src="images/facebook.png" alt="facebook"></a>
				</div>
				<div class="row">
					<a class="reseau" href="#"><img src="images/google.png" alt="google"></a>
					<a class="reseau"href="#"><img src="images/twitter.png" alt="twitter"></a>
				</div>
				
				
			</div>
			
		</div>
		<nav class="navbar navbar-expand-md navbar-light bg-light">
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
  			</button>
  			<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			 	<ul class="navbar-nav">
			 		<li class="nav-item">
    					<a class="nav-link test" href="index.php"><i class="fas fa-home"></i></a>
  					</li>
  					<li class="nav-item">
    					<a class="nav-link" href="recettes.php">Recette</a>
  					</li>
  					<li class="nav-item">
    					<a class="nav-link" href="menu.php">Menus</a>
  					</li>
  					<li class="nav-item">
    					<a class="nav-link" href="#">Desserts</a>
  					</li>
  					<li class="nav-item">
    					<a class="nav-link" href="#">Minceur</a>
  					</li>
  					<li class="nav-item">
    					<a class="nav-link" href="#">Atelier</a>
  					</li>
  					<li class="nav-item">
    					<a class="nav-link" href="membre.php">Membre</a>
  					</li>
  					<li class="nav-item d-block d-md-none">
    					<a class="nav-link" href="#">Déposer recette</a>
  					</li>

  					<?php 
  						if(isset($_SESSION['auth'])&&($_SESSION['auth']['statut']=='admin')){
  							?>
		  					<li class="nav-item">
    					<a class="nav-link" href="admin.php">Admin</a>
  					</li>
  						<?php
  					}
  					?>
  					<li class="nav-item d-none d-md-block">
  						<span class="nav-link nav-session">
	  						<?php
	  						if(isset($_SESSION['auth']['statut'])){
	  							echo 'Connecté sous : ' . ($_SESSION['auth']['login']);
	  						}
	  						?>
  						</span>
  					</li>

  					<li class="nav-item d-none d-md-block">
  						
  					</li>
				</ul>
  			</div>
		</nav>
</header>
<div class="main">