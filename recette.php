<?php

require "header.php";

require "pdo.php";

$req = $pdo->prepare('SELECT * FROM recettes, membres WHERE idMembre = membre AND idRecette = ?'); 
$id = $_GET['id'];
$_GET['id'] = htmlspecialchars($_GET['id']);
$req->execute(array($id));
$article = $req->fetch();
echo "
<div class='row recette_unique liste_recettes'>
  <div class='information_recette'>
    <h3>" . $article['titre'] . "</h3>
    <div class='auteur_recette'><img src='photos/gravatars/" . $article['gravatar'] . "'> Recette proposée par : " . $article['prenom'] . " " . $article['nom'] . "
    </div>
    <p>\" ". $article['chapo'] . "\" </p>
    <img class='photo_recette_unique'src='photos/recettes/" . $article['img'] . "'>
  </div><div class='w-100 d-none d-md-block'></div><h4>Recette :</h4>
  <div class='w-100'></div>
  <ul>
    <li><img src='images/temps.png'> <span>" . $article['tempsPreparation'] . " </span></li>
    <li><img src='images/cuisson.png'> <span>" . $article['tempsCuisson'] . " </span></li>
    <li><img src='images/prix.png'> <span> " . $article['prix'] . " </span></li>
  </ul>
  <div class='w-100'></div>
  <div class='cadre_recette'>
    <h4>Ingrédients :</h4>
    <div id='ingredient'>
      " . $article['ingredient'] . "
    </div>
  </div>
  <div class='w-100'></div>
  <div class='cadre_recette'>
    <div id='preparation'><h4>Préparation :</h4><div class='w-100'></div>
      " . $article['preparation'] . "
    </div>
  </div>
</div>";
?>
<?php

require "footer.php";

?>
