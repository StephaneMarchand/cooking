<?php

require "header.php";

require "pdo.php";

?>
<div id="maquette">
<figcaption>Index écran pc</figcaption><img src="Maquette/Index.png">
<figcaption>Index écran tablette</figcaption><img src="Maquette/index_tab.png">
<figcaption>Index écran smarphone</figcaption><img src="Maquette/index_smart.png">
<figcaption>Recettes écran pc</figcaption><img src="Maquette/recettes.png">
<figcaption>Recettes écran tablette</figcaption><img src="Maquette/recettes_tab.png">
<figcaption>Recettes écran smarphone</figcaption><img src="Maquette/recettes_smart.png">
<figcaption>Membre écran pc</figcaption><img src="Maquette/membre.png">
<figcaption>Membre écran smarphone</figcaption><img src="Maquette/membre_smart.png">
</div>


<?php
/*$result = $pdo->query("SELECT nom FROM categories");
$result->setFetchMode(PDO::FETCH_OBJ);
while( $ligne = $result->fetch() ) // on récupère la liste des membres
{
        echo 'Utilisateur : '.$ligne->nom.'<br />'; // on affiche les membres
}
*/

require "footer.php";

?>
