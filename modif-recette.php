
<?php

require "header.php";

require "pdo.php";




$req = $pdo->prepare('SELECT * FROM recettes WHERE  idRecette = ?'); 
$id = $_GET['id'];
$_GET['id'] = htmlspecialchars($_GET['id']);
$req->execute(array($id));
$resultat = $req->fetch();

 /*$req = $pdo->prepare('INSERT INTO recettes (titre, chapo, img, preparation,  ingredient, membre, couleur,  categorie, tempsCuisson, tempsPreparation, difficulte, prix) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
  $req->execute (array($_POST['titre'], $_POST['chapo'], "carottes-glacees-orange.jpg", $listeprepa, $liste, $_SESSION["auth"]["idMembre"], $_POST['couleur'], $_POST['categorie'], $_POST['tempsCuisson'], $_POST['tempsPreparation'], $_POST['difficulte'], $_POST['prix']));*/


//if (!isset($_POST['ingredient1'])){$_POST['ingredient1']="";}

?>

<div class="row row-compte s-inscrire">
  <h5>Modifier la recette</h5>
    <div class="w-100 d-none d-md-block"></div>
    <form method="POST" action="">
      <span>Titre<em>*</em></span><div class="w-100 d-none d-md-block"></div>
        <input type="text" name="titre" size="45" value="<?php echo($resultat['titre']) ?>" /><div class="w-100 d-none d-md-block"></div>

      <span>Chapo<em>*</em></span><div class="w-100 d-none d-md-block"></div>
        <textarea type="text" name="chapo" value="<?php echo($resultat['chapo']) ?>" ><?php echo($resultat['chapo']) ?></textarea><div class="w-100 d-none d-md-block"></div>

      <span>Image<em></em></span><div class="w-100 d-none d-md-block"></div>
        <input type="file" name="image" size="45" /><div class="w-100 d-none d-md-block"></div>
      
      <span>Préparation<em>*</em></span><div class="w-100 d-none d-md-block"></div>
      <textarea type="text" name="preparation" value="<?php echo($resultat['preparation']) ?>"><?php echo($resultat['preparation']) ?></textarea><div class="w-100 d-none d-md-block"></div>
      <select class="nombre_preparation" name="nombre_preparation" >
        <option selected value=0>0</option>
        <option value=1>1</option>
        <option value=2>2</option>
        <option value=3>3</option>
        <option value=4>4</option>
        <option value=5>5</option>
        <option value=6>6</option>
        <option value=7>7</option>
        <option value=8>8</option>
        <option value=9>9</option>
        <option value=10>4</option>
      </select><div class="w-100 d-none d-md-block mb-2"></div>

      <div class="champs_preparation">
        
      </div>

      <span>Ingrédient<em>*</em></span><div class="w-100 d-none d-md-block"></div>
      <textarea type="text" name="ingredient" value="<?php echo($resultat['ingredient']) ?>" ><?php echo($resultat['ingredient']) ?></textarea><div class="w-100 d-none d-md-block"></div>
       <select class="nombre_ingredient" name="nombre_ingredient" >
        <option selected value=0>0</option>
        <option value=1>1</option>
        <option value=2>2</option>
        <option value=3>3</option>
        <option value=4>4</option>
        <option value=5>5</option>
        <option value=6>6</option>
        <option value=7>7</option>
        <option value=8>8</option>
        <option value=9>9</option>
        <option value=10>4</option>
      </select><div class="w-100 d-none d-md-block mb-2"></div>

      <div class="champs_ingredient">
        
      </div>

      <span>Couleur<em>*</em></span><div class="w-100 d-none d-md-block"></div>
        <input type="text" name="couleur" size="45" value="<?php echo($resultat['couleur']) ?>" /><div class="w-100 d-none d-md-block"></div>

        <span>Catégorie<em>*</em></span><div class="w-100 d-none d-md-block"></div>
      <select name="categorie">
        <option value="<?php echo($resultat['categorie']) ?>" selected>Viande</option>
        <option value=1>Viande</option>
        <option value=2>Poisson</option>
        <option value=3>Légume</option>
        <option value=4>Fruit</option>
      </select><div class="w-100 d-none d-md-block mb-2"></div>

      <span>Temps de cuisson<em>*</em></span><div class="w-100 d-none d-md-block"></div>
        <input type="text" name="tempsCuisson" size="45" value="<?php echo($resultat['tempsCuisson']) ?>" /><div class="w-100 d-none d-md-block"></div>

      <span>Temps de préparation<em>*</em></span><div class="w-100 d-none d-md-block"></div>
        <input type="text" name="tempsPreparation" size="45" value="<?php echo($resultat['tempsPreparation']) ?>"  /><div class="w-100 d-none d-md-block"></div>

      <span>Difficulté<em>*</em></span><div class="w-100 d-none d-md-block"></div>
        <input type="text" name="difficulte" size="45" value="<?php echo($resultat['difficulte']) ?>" /><div class="w-100 d-none d-md-block"></div>

        <span>Prix<em>*</em></span><div class="w-100 d-none d-md-block"></div>
        <input type="text" name="prix" size="45" value="<?php echo($resultat['prix']) ?>"/><div class="w-100 d-none d-md-block"></div>


      <input class="input_compte" type="submit" value="Enregistrer les modifications" />
    </form>
</div>


<?php

require "footer.php";

if(!empty($_POST)){
  $req = $pdo->prepare('UPDATE recettes SET titre = ?, chapo = ?, img = ?, preparation = ?, ingredient = ?, membre = ?, couleur = ?, categorie = ?, tempsCuisson = ?, tempsPreparation = ?, difficulte = ?, prix = ? WHERE idRecette = ?');
      $id = $_GET['id'];

      $req->execute(array($_POST['titre'], $_POST['chapo'], "carottes-glacees-orange.jpg", $_POST['preparation'], $_POST['ingredient'], $_SESSION["auth"]["idMembre"], $_POST['couleur'], $_POST['categorie'], $_POST['tempsCuisson'], $_POST['tempsPreparation'], $_POST['difficulte'], $_POST['prix'],$id));
      $req->closeCursor();
}

?>

<script type="text/javascript">

 


</script>
