<?php

require "header.php";

require "pdo.php";

?>
<div class="row row_membre liste_recettes" >
	<h3 style="text-align: center;width: 100%;">ADMIN</h3><div class="w-100"></div>

	<table class="table table-striped">
	  <thead>
	    <tr>
	      <th scope="col">iDmembre</th>
	      <th scope="col">Prenom</th>
	      <th scope="col">Nom</th>
	      <th scope="col">Gravatar</th>
	      <th scope="col">Login</th>
	      <th scope="col">Statut</th>
	    </tr>
	  </thead>
	  <?php
	  $resultats=$pdo->query("SELECT * FROM membres");
		$ligne = $resultats->fetchAll();
		foreach ($ligne as $key => $value) { 
		?>
	  <tbody>
	    <tr>
	      <th scope="row"><?php echo $value['idMembre'] ?></th>
	      <td><?php echo $value['prenom'] ?></td>
	      <td><?php echo $value['nom'] ?></td>
	      <td><?php echo $value['gravatar'] ?></td>
	      <td><?php echo $value['login'] ?></td>
	      <td><?php echo $value['statut'] ?></td>
	      <td><a href="modif-compte.php"><button type="button" class="btn btn_search my-2 my-sm-0" aria-label="Left Align" onclick="appear('modif_login');">
				<i class="fas fa-edit"></i></a>
			</button></td>
	    </tr>
	  </tbody>
	  <?php

		$resultats->closeCursor();
	  }
	  ?>
	</table>
</div>


<?php

require "footer.php";

?>