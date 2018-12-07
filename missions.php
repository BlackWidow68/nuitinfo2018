<?php include("header.php"); ?>
<style>
	.masthead {
		margin-top: -10%;
		margin-bottom: -5%;
	}
	.table {
		background-color: #fff;
	}
	.mission {
		position: absolute;
		margin-top:-5%;
	}
</style>
<header class="masthead">
  <div class="container d-flex h-100 align-items-center">
	  <table class="table table-hover">
		  <thead>
			  <tr>
				  <th scope="col">#</th>
				  <th scope="col">Titre</th>
				  <th scope="col">Status</th>
				  <th scope="col">Assigné à</th>
			  </tr>
		  </thead>
		  <tbody>
	  <?php
	  $response = $bdd->query("SELECT id, title, status, asign FROM missions ORDER BY id DESC");
	  while ($donnees = $response->fetch()) {
		  $id = secure($donnees['id']);
		  $title = secure($donnees['title']);
		  $status = secure($donnees['status']);
		  $assign = secure($donnees['asign']);
		  $status_value = array("Nouveau", "Assigné", "En cours", "Terminé", "Fermé");
		  $response_pseudo = $bdd->query("SELECT id, pseudo FROM user WHERE id='$assign'");
		  while ($data = $response_pseudo->fetch()) {
			  $pseudo = secure($data['pseudo']);
			  break;
		  }

	  ?>
	      <tr>
		<th scope="row"><a href="mission_display.php?id=<?php echo $id; ?>">#<?php echo $id;?></a></th>
		<td><?php echo $title ?></td>
		<td><?php echo $status_value[$status]; ?></td>
		<td><?php echo $pseudo;?><td>
	      </tr>
	    <?php
	    }
	    ?>
	    </tbody>
    </table>
  </div>
</header>
<?php include("footer.php"); ?>
