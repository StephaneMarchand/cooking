
<?php

require "header.php";

require "pdo.php";


if(!empty($_POST))
{
  //image a mettre
  $liste = "";
  $fin_liste = FALSE;
  for ($i=0 ; $i < 10; $i++) { 
    $postingredient = "ingredient".$i;

    if (!isset($_POST[$postingredient])){$_POST[$postingredient]=""; $fin_liste=TRUE ; $i=10;}
    if ($fin_liste != TRUE){
    $liste =  $liste . "<li>" . $_POST[$postingredient] . "</li>";
    }
  }

    $listeprepa = "";
  $fin_listeprepa = FALSE;
  for ($u=0 ; $u < 10; $u++) { 
    $postpreparation = "preparation".$u;

    if (!isset($_POST[$postpreparation])){$_POST[$postpreparation]=""; $fin_listeprepa=TRUE ; $u=10;}
    if ($fin_listeprepa != TRUE){
    $listeprepa =  $listeprepa . "<li>" . $_POST[$postpreparation] . "</li>";
    }
  }

  echo $liste;


  $req = $pdo->prepare('INSERT INTO recettes (titre, chapo, img, preparation,  ingredient, membre, couleur,  categorie, tempsCuisson, tempsPreparation, difficulte, prix) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
  $req->execute (array($_POST['titre'], $_POST['chapo'], "carottes-glacees-orange.jpg", $listeprepa, $liste, $_SESSION["auth"]["idMembre"], $_POST['couleur'], $_POST['categorie'], $_POST['tempsCuisson'], $_POST['tempsPreparation'], $_POST['difficulte'], $_POST['prix']));


//if (!isset($_POST['ingredient1'])){$_POST['ingredient1']="";}

}
?>

<div class="row row-compte s-inscrire">
  <h5>Déposer une recette</h5>
    <div class="w-100 d-none d-md-block"></div>
    <form method="POST" action="">
      <span>Titre<em>*</em></span><div class="w-100 d-none d-md-block"></div>
        <input type="text" name="titre" size="45" /><div class="w-100 d-none d-md-block"></div>

      <span>Chapo<em>*</em></span><div class="w-100 d-none d-md-block"></div>
        <textarea type="text" name="chapo"></textarea><div class="w-100 d-none d-md-block"></div>

      <span>Image<em></em></span><div class="w-100 d-none d-md-block"></div>
        <input type="file" name="image" size="45" /><div class="w-100 d-none d-md-block"></div>
      
      <span>Préparation<em>*</em></span><div class="w-100 d-none d-md-block"></div>
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
        <input type="text" name="couleur" size="45" /><div class="w-100 d-none d-md-block"></div>

        <span>Catégorie<em>*</em></span><div class="w-100 d-none d-md-block"></div>
      <select name="categorie">
        <option value=1>Viande</option>
        <option value=2>Poisson</option>
        <option value=3>Légume</option>
        <option value=4>Fruit</option>
      </select><div class="w-100 d-none d-md-block mb-2"></div>

      <span>Temps de cuisson<em>*</em></span><div class="w-100 d-none d-md-block"></div>
        <input type="text" name="tempsCuisson" size="45" /><div class="w-100 d-none d-md-block"></div>

      <span>Temps de préparation<em>*</em></span><div class="w-100 d-none d-md-block"></div>
        <input type="text" name="tempsPreparation" size="45" /><div class="w-100 d-none d-md-block"></div>

      <span>Difficulté<em>*</em></span><div class="w-100 d-none d-md-block"></div>
        <input type="text" name="difficulte" size="45" /><div class="w-100 d-none d-md-block"></div>

        <span>Prix<em>*</em></span><div class="w-100 d-none d-md-block"></div>
        <input type="text" name="prix" size="45" /><div class="w-100 d-none d-md-block"></div>


      <input class="input_compte" type="submit" value="Valider la recette" />
    </form>
</div>


<?php

require "footer.php";

?>

<script type="text/javascript">

 
$(".nombre_ingredient").change(function(){
  $(".champs_ingredient").empty();
  let nombre_ingredient = $(this).val();
  console.log(nombre_ingredient);
        for (let i = 0; i < nombre_ingredient ; i++) {
          $(".champs_ingredient").append("<input type='text' name='ingredient"+i+"' size='45'/><div class='w-100 d-none d-md-block'></div>");
    }
}); 

$(".nombre_preparation").change(function(){
  $(".champs_preparation").empty();
  let nombre_ingredient = $(this).val();
  console.log(nombre_ingredient);
        for (let i = 0; i < nombre_ingredient ; i++) {
          $(".champs_preparation").append("<input type='text' name='preparation"+i+"' size='45'/><div class='w-100 d-none d-md-block'></div>");
          console.log('nana');
    }
}); 


</script>
