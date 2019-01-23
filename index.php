<?php

require "header.php";

require "pdo.php";


?>
<!-- Slideshow container -->
<div class="row" style="background-color: white; margin-top: 20px;"  >
  <div class="slideshow-container" >

    <!-- Full-width images with number and caption text style="margin-left: auto !important;margin-right: auto !important;display: block !important;" -->
    <?php

    $resultats=$pdo->query("SELECT titre, img, chapo, idRecette FROM recettes WHERE idRecette =5");
    $ligne = $resultats->fetch(PDO::FETCH_OBJ);
    echo 
    "<div class='mySlides fade '>
      <img class='recettejour sildeindex' alt='slide photo' src=photos/recettes/". $ligne->img .">
      <div class='text'><h5><a href='recette.php?id=". $ligne->idRecette . "'><span class='titre_recette' style='font-size: 22px'>" . $ligne->titre . "</span></a></h5>
      </div>
    </div>";  $resultats->closeCursor();
    $resultats=$pdo->query("SELECT titre, img, chapo, idRecette FROM recettes WHERE idRecette =6");
    $ligne = $resultats->fetch(PDO::FETCH_OBJ);
    echo 
    "<div class='mySlides fade '>
      <img class='recettejour' alt='slide photo' src=photos/recettes/". $ligne->img .">
      <div class='text'><h5><a href='recette.php?id=". $ligne->idRecette . "'><span class='titre_recette' style='font-size: 22px' >" . $ligne->titre . "</span></a></h5>
      </div>
    </div>";$resultats->closeCursor();
    $resultats=$pdo->query("SELECT titre, img, chapo, idRecette FROM recettes WHERE idRecette =7");
    $ligne = $resultats->fetch(PDO::FETCH_OBJ);
    echo "
    <div class='mySlides fade'>
      <img class='recettejour' alt='slide photo' src=photos/recettes/". $ligne->img .">
      <div class='text'><h5><a href='recette.php?id=". $ligne->idRecette . "'><span class='titre_recette' style='font-size: 22px'>" . $ligne->titre . "</span></a></h5></div>
      </div>
    </div>";$resultats->closeCursor();

    ?>
  

</div>
  <div  style="background-color: white;text-align:center;margin-left: -15px;margin-right: -15px;">
    <span class="dot"></span> 
    <span class="dot"></span> 
    <span class="dot"></span> 
  </div>
  <div class="row_membre" style="margin-right: -15px;margin-left: -15px;">
    <h3>RECETTES DU JOUR</h3>
  </div>

														<!-- recette du jour SELECT * FROM recettes ORDER BY dateCrea DESC LIMIT 0,3 -->
<div class="row" style="text-align: center;margin-top: 10px;margin-left: -30px;margin-right: -30px;" >
	<div class="col-md-4">

		<?php

		$resultats=$pdo->query("SELECT titre, img, chapo, idRecette  FROM recettes WHERE idRecette = 2");
		$ligne = $resultats->fetch(PDO::FETCH_OBJ);
		echo 
    "<div class='cadre_recette_jour'><h5><a href='recette.php?id=". $ligne->idRecette  . "'><span class='titre_recette'>" . $ligne->titre . "</span></a></h5>
      <a href='recette.php?id=". $ligne->idRecette  . "'><img class='recettejour' alt='" . $ligne->titre . "' src=photos/recettes/". $ligne->img ."></a><p>" . $ligne->chapo . "</p>
    </div>";$resultats->closeCursor();

		?>
	</div>
	<div class="col-md-4">
		<?php

		$resultats=$pdo->query("SELECT titre, img, chapo, idRecette FROM recettes WHERE idRecette = 3");
		$ligne = $resultats->fetch(PDO::FETCH_OBJ);
		echo "
    <div class='cadre_recette_jour'><h5><a href='recette.php?id=". $ligne->idRecette  . "'><span class='titre_recette'>" . $ligne->titre . "</span></a></h5>" .
    "<a href='recette.php?id=". $ligne->idRecette  . "'><img class='recettejour' alt='" . $ligne->titre . "' src=photos/recettes/". $ligne->img ."></a>" . 
    "<p>" . $ligne->chapo . "</p>
    </div>";$resultats->closeCursor();
		?>
		
	</div>
	<div class="col-md-4">
		<?php

		$resultats=$pdo->query("SELECT titre, img, chapo, idRecette FROM recettes WHERE idRecette = 4");
		$ligne = $resultats->fetch(PDO::FETCH_OBJ);
		echo "
    <div class='cadre_recette_jour'><h5><a href='recette.php?id=". $ligne->idRecette  . "'><span class='titre_recette'>" . $ligne->titre . "</span></a></h5>" .
    "<a href='recette.php?id=". $ligne->idRecette  . "'><img class='recettejour' alt='" . $ligne->titre . "' src=photos/recettes/". $ligne->img ."></a>" . 
    "<p>" . $ligne->chapo . "</p>
    </div>";$resultats->closeCursor();
		?>
		
	</div>
</div>


<script type="text/javascript">
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}

</script>
<?php

require "footer.php";

?>