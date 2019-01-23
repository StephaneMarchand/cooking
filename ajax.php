
<?php 


require "pdo.php";

    if(!empty($_POST))
    {

        if ($_POST['script'] == "updateInfos") {

            $idMembre = $_POST['idMembre'];
            $valeur = $_POST['valeur'];
            $newValeur = "'" . $_POST['newValeur'] . "'";
            $champs = $_POST['champs'];
    
            $requete = "UPDATE membres SET $champs = $newValeur WHERE idMembre = $idMembre";
            $_SESSION["auth"]["login"] = $newValeur;

    
            // Insertion :

            $result = $pdo->exec($requete);

        

            echo $result;

           

        }



        if ($_POST['script'] == "delete_recette_ajax") {

            $idMembre = $_POST['idMembre'];
            $valeur = $_POST['valeur'];
            $champs = $_POST['champs'];
    
            $requete = "DELETE FROM recettes WHERE $champs = $valeur";

    
            // Insertion :

            $result = $pdo->exec($requete);

        

            echo $result;

           

        }
    }

?>

    